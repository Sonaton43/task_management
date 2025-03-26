<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;
use Auth;

class UsersController extends Controller
{
    //Index
    public function index(){
        $items = User::where('manager_id', Auth::user()->id)->get();
        return view('Users.index',compact('items'));
    }
    public function create(){
        return view('Users.create');
    }
    public function store(Request $request){

        request()->validate([
            'name' => 'required|max:150',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'role' => 'required|in:manager,teammate',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',
        ]);

        $save = new User;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->role = $request->role;
        $save->manager_id = Auth::user()->id;
        $save->designation = $request->designation;
        $save->password = Hash::make($request->password);

        $save->save();
        return redirect()->route('user.index')->with('success', 'User Created Successfully');
    }
    public function edit($token){
        $item = User::find($token);
        return view('Users.edit',compact('item'));
    }
    public function update(Request $request){

        request()->validate([
            'name' => 'required|max:150',
            'phone' => 'required|numeric',
            'role' => 'required|in:manager,teammate',
        ]);

        $token = $request->token;
        $update = User::find($token);

        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->role = $request->role;
        $update->designation = $request->designation;
        if(!empty($request->password)){
            if($request->password == $request->cpassword){
                $update->password = Hash::make($request->password);
            }else{
                return redirect()->back()->with('error', 'password & confirm password no matching.');
            }  
        } 
        $update->save();
        return redirect()->back()->with('success', 'User Update Successfully');
    }
    public function delete($token){
        $delte = User::find($token);
        $delte->delete();
        return redirect()->route('user.index')->with('success', 'User Delete Successfully');
    }
}
