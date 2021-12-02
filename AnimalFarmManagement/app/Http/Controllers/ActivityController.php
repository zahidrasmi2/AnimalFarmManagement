<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AnimalHistory;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActivityExports;

class ActivityController extends Controller
{
    //
    public function activityList()
    {
        $animalH = AnimalHistory::where('current_team_id', auth()->user()->current_team_id)->orderBy('created_at', 'DESC')->get();
        $staffList = User::select('id', 'name')->where('current_team_id', auth()->user()->current_team_id)->get();

        Log::info($animalH);

        return view('manager.animal.animalActivity', compact('animalH', 'staffList'));
    }

    public function activityDownload()
    {
        return Excel::download(new ActivityExports, 'Activity_Reports.xlsx');
    }

    public function searchActivity(Request $request)
    {
        $tagNumberA = $request->input('breedLetter');
        $tagNumberB = $request->input('breedNumber');
        $breed = $request->input('breed');
        $health = $request->input('health');
        $status = $request->input('status');
        $date_after = $request->input('date_after');
        $date_before = $request->input('date_before');
        $staff_id = $request->input('staff_id');

        // dd($tagNumberA);
        $animalH = AnimalHistory::when($staff_id, function ($query) use ($staff_id) {
            $query->where('checkBy', $staff_id);
        })->when($tagNumberA, function ($query) use ($tagNumberA) {
            $query->where('tagNumber', 'LIKE', '%' . $tagNumberA . '%');
        })->when($tagNumberB, function ($query) use ($tagNumberB) {
            $query->where('tagNumber', 'LIKE', '%' . $tagNumberB . '%');
        })->when($breed, function ($query) use ($breed) {
            $query->where('breed', $breed);
        })->when($health, function ($query) use ($health) {
            $query->where('health', $health);
        })->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })->when($date_after, function ($query) use ($date_after) {
            $query->where('created_at', '>=', $date_after);
        })->when($date_before, function ($query) use ($date_before) {
            $query->where('created_at', '<=', $date_before);
        })->where('current_team_id', auth()->user()->current_team_id)
            ->orderBy('created_at', 'DESC')->get();

        // dd($request->all());

        $staffList = User::select('id', 'name')->where('current_team_id', auth()->user()->current_team_id)->get();
        return view('manager.animal.animalActivity', compact('animalH', 'staffList'));
    }
}
