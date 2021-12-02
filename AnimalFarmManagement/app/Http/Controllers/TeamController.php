<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function deleteStaff($id)
    {
        User::destroy($id);
        return redirect() -> route('manager.staff.staffList');
    }
}
