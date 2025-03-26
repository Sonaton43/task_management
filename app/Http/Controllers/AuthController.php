<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use Hash;
use Auth;
use Str;
use Mail;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        } else {
            // User is logged out
            return view('auth.login');
        }
    }

    public function login_check(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
            if(Auth::User()->role == "manager" || Auth::User()->role == "teammate"){
                if (Auth::check()) {
                    return redirect()->intended('/dashboard');
                } else {
                    // User is logged out
                    Auth::logout();
                    return view('auth.login');
                }
            }else{
                Auth::logout();
                return redirect()->back()->with('error',"Please Enter Correct Email & Password.");
            }
        }else{
            Auth::logout();
            return redirect()->back()->with('error',"Please Enter Correct Email & Password.");
        }
    }

    public function logout(){
            Auth::logout();
            return redirect('/');
    }

    public function signup(){
        return view('auth.register');
    }

    public function profile(){
        $token = Auth::user()->id;
        $item = User::find($token);
        return view('profile',compact('item'));
    }

    public function sign_up(Request $request){

        request()->validate([
            'name' => 'required|max:150',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',
        ]);

        $save = new User;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->role = "manager";
        $save->designation = "Manager";
        $save->password = Hash::make($request->password);

        $save->save();

        return redirect()->route('login')->with('success',"Your account create successfully.");
    }

}
