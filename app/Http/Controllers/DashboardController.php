<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Projects;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    //
    public function dashboard() {
        $projects = Projects::where('manager_id', Auth::user()->id)->with('manager')->get();
        $tasks = Task::where(function ($query) {$query->where('manager_id', Auth::user()->id)->orWhere('assigned_to', Auth::user()->id);})
        ->with('manager', 'project', 'assignee')
        ->get();
        return view('dashboard', compact('projects', 'tasks'));
    }
}
