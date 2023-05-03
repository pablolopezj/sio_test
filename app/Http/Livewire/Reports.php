<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Project;

class Reports extends Component
{
    public function render()
    {
        // $month = '2023-05'; 
        // $users = User::select('users.name', DB::raw('SUM(timers.logged_time) as total_logged_time'))
        //     ->join('timers', 'users.id', '=', 'timers.user_id')
        //     ->whereRaw('DATE_FORMAT(timers.start_at, "%Y-%m") = ?', [$month])
        //     ->groupBy('users.id')
        //     ->get();


        $time_day = DB::table('timers')
            ->selectRaw('projects.id, projects.name, projects.assigned_time, DATE_FORMAT(timers.start_at, "%Y-%m-%d") AS date, 
                        SUM(timers.logged_time) AS tiempo_total, users.name as username')
            ->join('projects', 'timers.project_id', '=', 'projects.id')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->groupBy('project_id', 'date')
            ->orderBy('project_id', 'desc')
            ->orderBy('date', 'asc')
            ->get();

        $time_month = DB::table('timers')
            ->selectRaw('projects.id, projects.name, projects.assigned_time, DATE_FORMAT(timers.start_at, "%Y-%m") AS date, 
                        SUM(timers.logged_time) AS tiempo_total, users.name as username')
            ->join('projects', 'timers.project_id', '=', 'projects.id')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->groupBy('project_id', 'date')
            ->orderBy('project_id', 'desc')
            ->orderBy('date', 'asc')
            ->get();

        
        
        return view('livewire.reports', ['projects' => $time_day, 'logmonth' => $time_month]);
    }
}
