<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Auth;

class ProjectController extends Controller
{
    //index
    public function index() {
        $items = Projects::where('manager_id', Auth::user()->id)->with('manager')->get();
        return view('projects.index', compact('items'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store(Request $request) {
        request()->validate([
            'project_name' => 'required',
        ]);

        $save = new Projects;
        $save->project_name = $request->project_name;
        $save->manager_id = $request->manager_id ;
        $save->project_dsc = $request->project_dsc;
        $save->save();

        $save->project_code = 'PRO-' . "00100" . '-' . $save->id ;
        $save->save();

        return redirect()->route('project.index')->with('success', 'Project Created Successfully');
    }

    public function edit($token){
        $item = Projects::find($token);
        return view('projects.edit',compact('item'));
    }

    public function update(Request $request){
        $token = $request->token;
        $update = Projects::find($token);
        $update->project_name = $request->project_name;
        $update->project_dsc = $request->project_dsc;
        $update->save();

        return redirect()->route('project.index')->with('success', 'Project Update Successfully');
    }

    public function delete($token){
        $delte = Projects::find($token);
        $delte->delete();
        return redirect()->route('project.index')->with('success', 'User Delete Successfully');
    }
}
