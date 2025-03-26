<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Projects;
use App\Models\User;
use Auth;

class TaskController extends Controller
{
    //index
    public function index() {
        $items = Task::where(function ($query) {$query->where('manager_id', Auth::user()->id)->orWhere('assigned_to', Auth::user()->id);})
        ->with('manager', 'project', 'assignee')
        ->get();
        return view('tasks.index', compact('items'));
    }

    //create
    public function create() {
        $projects = Projects::where('manager_id', Auth::user()->id)->get();
        $users = User::where('manager_id', Auth::user()->id)->get();
        return view('tasks.create', compact('projects', 'users'));
    }

    //store
    public function store(Request $request) {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'assigned_to' => 'required',
        ]);

        $save = new Task;
        $save->title = $request->title;
        $save->description = $request->description;
        $save->manager_id = $request->manager_id ;
        $save->project_id = $request->project_id;
        $save->assigned_to = $request->assigned_to;
        $save->save();

        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }

    //edit
    public function edit($token){
        $task = Task::find($token);
        $projects = Projects::where('manager_id', Auth::user()->id)->get();
        $users = User::where('manager_id', Auth::user()->id)->get();
        return view('tasks.edit',compact('task', 'projects', 'users'));
    }

    //update
    public function update(Request $request){
        $token = $request->token;
        $update = Task::find($token);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->project_id = $request->project_id;
        $update->assigned_to = $request->assigned_to;
        $update->save();

        return redirect()->route('tasks.index')->with('success', 'Task Update Successfully');
    }

    //status
    public function status(Request $request){
        $token = $request->token;
        $status = Task::find($token);
        $status->status = $request->status;
        $status->save();

        return redirect()->back();
    }

    //delete
    public function delete($token){
        $delte = Task::find($token);
        $delte->delete();
        return redirect()->route('tasks.index')->with('success', 'Task Delete Successfully');
    }
}
