<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Worktable;
use App\Models\Animals;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Exports\WorktableExports;
use Illuminate\Queue\Worker;

class WorktableController extends Controller
{
    //

    public function workTable() //Display work table based on user team id
    {
        $workTable = Worktable::where('current_team_id', auth()->user()->current_team_id)->orderBy('date_until', 'DESC')->get();
        $staffList = User::select('id', 'name')->where('current_team_id', auth()->user()->current_team_id)->get();
        Log::info(auth()->user()->current_team_id . ' zahid ');

        return view('manager.worktable.tableList', compact('workTable', 'staffList'));
    }

    public function viewWorktable() //Display page to create schedule/worktable
    {
        $animal = Animals::where('current_team_id', auth()->user()->current_team_id)->where('status', 'Alive')->orderBy('tagNumber', 'ASC')->get();
        Log::info(auth()->user()->current_team_id . ' zahid ');

        $staffList = User::select('id', 'name')->where('current_team_id', auth()->user()->current_team_id)->get();
        return view('manager.worktable.createWork', compact('animal', 'staffList'));
    }

    public function saveWorktable(Request $request) //Insert schedule into database
    {
        $validate = $request->validate([
            'date_from' => 'required|date',
            'date_until' => 'required|date|after_or_equal:date_from',
            'staff_id' => 'required',
            'animals' => 'required',
            'details' => 'max:500',
        ]);

        $worktable = new Worktable();
        $worktable->date_from = $request->date_from;
        $worktable->date_until = $request->date_until;
        $worktable->staff_id = $request->staff_id;
        $worktable->animals = json_encode($request->animals);
        $worktable->details = $request->details;
        $worktable->current_team_id = auth()->user()->current_team_id;
        $worktable->save();

        return redirect()->route('manager.worktable.tableList');
    }

    public function deleteTable($id)
    {
        $worktable = Worktable::find($id)->delete();
        // $worktable->delete();
        return redirect()->route('manager.worktable.tableList');
    }

    public function searchWorktable(Request $request)
    {
        $staff_id = $request->input('staff_id');
        $date_from = $request->input('date_from');
        $date_until = $request->input('date_until');

        $workTable = Worktable::when($date_from, function ($query) use ($date_from) {
            $query->where('date_from', '>=', $date_from);
        })->when($date_until, function ($query) use ($date_until) {
            $query->where('date_until', '<=', $date_until);
        })->when($staff_id, function ($query) use ($staff_id) {
            $query->where('staff_id', $staff_id);
        })->get();

        $staffList = User::select('id', 'name')->where('current_team_id', auth()->user()->current_team_id)->get();

        return view('manager.worktable.tableList', compact('workTable', 'staffList'));
    }

    public function downloadWorktableExcel(Request $request)
    {
        // return Excel::download(new WorktableExports, 'Schedule.xlsx');

        $worktableRequest = app(Worktable::class)->newQuery();

        $staff_id = $request->input('staff_id');
        $date_from = $request->input('date_from');
        $date_until = $request->input('date_until');
        $created_after = $request->input('created_after');
        $created_before = $request->input('created_before');

        $worktableRequest = Worktable::when($date_from, function ($query) use ($date_from) {
            $query->where('date_from', '>=', $date_from);
        })->when($date_until, function ($query) use ($date_until) {
            $query->where('date_until', '<=', $date_until);
        })->when($created_after, function ($query) use ($created_after) {
            $query->where('created_at', '>=', $created_after);
        })->when($staff_id, function ($query) use ($staff_id) {
            $query->where('staff_id', $staff_id);
        })->get();

        return Excel::download(new WorktableExports($worktableRequest), 'FilterSchedule.xlsx');
    }
}
