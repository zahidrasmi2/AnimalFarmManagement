<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animals;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AnimalHistory;
use App\Models\Worktable;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnimalExports;
use Exception;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AnimalController extends Controller
{
    public function animalList() //Display animal base on user team id
    {
        $animal = Animals::where('current_team_id', auth()->user()->current_team_id)->orderBy('status', 'ASC')->orderBy('tagNumber', 'ASC')->get();
        $staffList = User::select('id', 'name')->where('current_team_id', auth()->user()->current_team_id)->get();

        return view('manager.animal.animalList', compact('animal', 'staffList'));
    }

    public function animalHistoryList($id)
    {
        $animal = Animals::where('id', $id)->get();
        $animalH = AnimalHistory::where('animalID', $id)->orderBy('id', 'desc')->get();
        return view('manager.animal.historyAnimal', compact('animal', 'animalH', 'id'));
    }

    public function createAnimal() //Display page to register animal
    {
        return view('manager.animal.insertAnimal');
    }

    public function saveAnimal(Request $request) //Insert animal into database
    {
        $validate = $request->validate([
            'breedLetter' => 'required',
            'breedNumber' => 'required',
            'breed' => 'required',
            'bornYear' => 'required|date',
            'weight' => 'required|numeric',
            'health' => 'required',
            'comment' => 'nullable|max:500',
        ]);

        $findAnimal = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('tagNumber', $request->breedLetter . $request->breedNumber)
            ->where('status', 'Alive')
            ->count();

        if ($findAnimal >= 1) {
            return redirect()->back()->withInput()->with('message', 'You insert TAG NUMBER for currently ALIVE animal TRY AGAIN');
        } else {
            $animal = new Animals();
            $animal->tagNumber = $request->breedLetter . '' . $request->breedNumber;
            $animal->breed = $request->breed;
            $animal->bornYear = $request->bornYear;
            $animal->weight = $request->weight;
            $animal->health = $request->health;
            $animal->comment = $request->comment;
            $animal->status = 'Alive';
            $animal->checkBy = auth()->user()->id;
            $animal->current_team_id = auth()->user()->current_team_id;
            $animal->checkDate = new DateTime();
            $animal->save();
            Log::info($animal);
            return redirect()->route('manager.animal.animalList');
        }

        Log::info($findAnimal);
    }

    public function editAnimal($id) //Display animal id page to edit
    {
        return view('manager.animal.editAnimal')->with('id', $id);
    }

    public function saveEditAnimal(Request $request, $id) //Edit animal data
    {
        $validate = $request->validate([
            'breedLetter' => 'required',
            'breedNumber' => 'required',
            'breed' => 'required',
            'bornYear' => 'required|date',
        ]);

        $findAnimal = Animals::where('current_team_id', auth()->user()->current_team_id)->where('tagNumber', $request->breedLetter . $request->breedNumber)->where('status', 'Alive')->count();

        if ($findAnimal >= 1) {
            return redirect()->back()->withInput()->with('message', 'You insert TAG NUMBER for currently ALIVE animal TRY AGAIN');
        } else {
            $tagNumber = $request->breedLetter . '' . $request->breedNumber;
            $breed = $request->breed;
            $bornYear = $request->bornYear;
            $checkBy = auth()->user()->id;
            $checkDate = new DateTime();

            $animal = Animals::find($id);
            $animalH = new AnimalHistory();

            //Save data to history
            $animalH->animalID = $animal->id;
            $animalH->tagNumber = $animal->tagNumber;
            $animalH->breed = $animal->breed;
            $animalH->bornYear = $animal->bornYear;
            $animalH->weight = $animal->weight;
            $animalH->health = $animal->health;
            $animalH->comment = $animal->comment;
            $animalH->status = $animal->status;
            $animalH->checkBy = $animal->checkBy;
            $animalH->checkDate = $animal->checkDate;
            $animalH->current_team_id = $animal->current_team_id;

            //Save edit data
            $animal->tagNumber = $tagNumber;
            $animal->breed = $breed;
            $animal->bornYear = $bornYear;
            $animal->checkBy = $checkBy;
            $animal->checkDate = $checkDate;

            $animal->save();
            $animalH->save();
            return redirect()->route('manager.animal.animalList');
        }
    }

    public function updateAnimal($id) //Display animal id page to edit
    {
        $animal = Animals::find($id);
        return view('manager.animal.updateAnimal')->with('id', $id)->with('animal', $animal);
    }

    public function saveUpdateAnimal(Request $request, $id) // Save update date to database
    {
        $validate = $request->validate([
            'weight' => 'required',
            'health' => 'required',
            'comment' => 'nullable',
            'status' => 'required',
        ]);


        $weight = $request->weight;
        $health = $request->health;
        $comment = $request->comment;
        $status = $request->status;
        $checkBy = auth()->user()->id;
        $checkDate = new DateTime();

        $animal = Animals::find($id);
        $animalH = new AnimalHistory();

        $animalH->animalID = $animal->id;
        $animalH->tagNumber = $animal->tagNumber;
        $animalH->breed = $animal->breed;
        $animalH->bornYear = $animal->bornYear;
        $animalH->weight = $animal->weight;
        $animalH->health = $animal->health;
        $animalH->comment = $animal->comment;
        $animalH->status = $animal->status;
        $animalH->checkBy = $animal->checkBy;
        $animalH->checkDate = $animal->checkDate;
        $animalH->current_team_id = $animal->current_team_id;

        $animal->weight = $weight;
        $animal->health = $health;
        $animal->comment = $comment;
        $animal->status = $status;
        $animal->checkBy = $checkBy;
        $animal->checkDate = $checkDate;

        if ($status == 'Alive') {
            $findAnimal = Animals::where('current_team_id', auth()->user()->current_team_id)
                ->where('tagNumber', 'LIKE', $animal->tagNumber)
                ->where('status', 'Alive')
                ->count();

            if ($findAnimal >= 1) {
                $getID = Animals::where('current_team_id', auth()->user()->current_team_id)
                    ->where('tagNumber', $animal->tagNumber)
                    ->where('status', 'Alive')
                    ->first();

                log::info($getID);
                $animalID = $getID->id;
                log::info($animalID);
                if ($animalID == $animal->id) {
                    $animalH->save();
                    $animal->save();
                } else {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('message', 'You are changing animal with same TAG NUMBER for currently ALIVE animal TRY AGAIN');
                }
            } else {
                $animalH->save();
                $animal->save();
            }
        } else {
            $animalH->save();
            $animal->save();
        }

        return redirect()->route('manager.animal.animalList');
    }

    public function deleteAnimal($id) //Delete animal data
    {
        $animal = Animals::find($id);

        // $id = (string)$id;

        // Worktable::where('animals', 'LIKE', '%' . $id . '%')
        //     ->delete();

        $animal->delete();

        return redirect()->route('manager.animal.animalList');
    }

    public function downloadExcel() //Download animal report using excel
    {
        return Excel::download(new AnimalExports, 'Animals_Report.xlsx');
    }

    public function downloadFilter()
    {
    }

    public function searchAnimal(Request $request)
    {
        $tagNumberA = $request->input('breedLetter');
        $tagNumberB = $request->input('breedNumber');
        $breed = $request->input('breed');
        $health = $request->input('health');
        $status = $request->input('status');
        $date_from = $request->input('date_before');
        $date_until = $request->input('date_until');
        $staff_id = $request->input('staff_id');

        $animal = Animals::when($staff_id, function ($query) use ($staff_id) {
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
        })->when($date_from, function ($query) use ($date_from) {
            $query->where('checkDate', '>=', $date_from);
        })->when($date_until, function ($query) use ($date_until) {
            $query->where('checkDate', '<=', $date_until);
        })->where('current_team_id', auth()->user()->current_team_id)->orderBy('tagNumber')->get();

        // dd($request->all());

        $staffList = User::select('id', 'name')->where('current_team_id', auth()->user()->current_team_id)->get();
        return view('manager.animal.animalList', compact('animal', 'staffList'));
    }
}
