<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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

class DashboardController extends Controller
{
    //

    public function dataResult()
    {
        $animal = Animals::where('current_team_id', auth()->user()->current_team_id)->get();

        // Request Status Count
        $totalAlive = Animals::where('current_team_id', auth()->user()->current_team_id)->where('status', 'Alive')->count();

        $totalDeath = Animals::where('current_team_id', auth()->user()->current_team_id)->where('status', 'Death')->count();
        $totalSold = Animals::where('current_team_id', auth()->user()->current_team_id)->where('status', 'Sold')->count();
        $totalButchered = Animals::where('current_team_id', auth()->user()->current_team_id)->where('status', 'Butchered')->count();

        //Request Health Count
        $totalAdequate = Animals::where('current_team_id', auth()->user()->current_team_id)->where('health', 'Adequate')->where('status', 'Alive')->count();
        $totalSub = Animals::where('current_team_id', auth()->user()->current_team_id)->where('health', 'Sub-Optimal')->where('status', 'Alive')->count();
        $totalPoor = Animals::where('current_team_id', auth()->user()->current_team_id)->where('health', 'Poor')->where('status', 'Alive')->count();

        //Request Butchered
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $totalButcheredWeek = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Butchered')
            ->whereBetween('checkDate', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $totalButcheredMonth = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Butchered')
            ->whereMonth('checkDate', Carbon::now()->month)
            ->count();

        $totalButcheredYear = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Butchered')
            ->whereYear('checkDate', Carbon::now()->year)
            ->count();

        //Request Sold
        $totalSolddWeek = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Sold')
            ->whereBetween('checkDate', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $totalSoldMonth = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Sold')
            ->whereMonth('checkDate', Carbon::now()->month)
            ->count();

        $totalSoldYear = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Sold')
            ->whereYear('checkDate', Carbon::now()->year)
            ->count();

        //Request Death
        $totalDeathWeek = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Death')
            ->whereBetween('checkDate', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $totalDeathMonth = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Death')
            ->whereMonth('checkDate', Carbon::now()->month)
            ->count();

        $totalDeathYear = Animals::where('current_team_id', auth()->user()->current_team_id)
            ->where('status', 'Death')
            ->whereYear('checkDate', Carbon::now()->year)
            ->count();

        // dd($totalButcheredMonth);

        // dd($totalAlive);
        return view(
            'dashboard',
            compact(
                'totalAlive',
                'totalDeath',
                'totalSold',
                'totalButchered',
                'totalAdequate',
                'totalSub',
                'totalPoor',
                'totalButcheredWeek',
                'totalButcheredMonth',
                'totalButcheredYear',
                'totalSolddWeek',
                'totalSoldMonth',
                'totalSoldYear',
                'totalDeathWeek',
                'totalDeathMonth',
                'totalDeathYear'
            )
        );
    }
}
