<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animals;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller
{

    public function staffList()
    {
        $staff = User::where('current_team_id',auth()->user()->current_team_id)->get();
        return view('manager.staff.staffList', compact('staff'));
    }

}
