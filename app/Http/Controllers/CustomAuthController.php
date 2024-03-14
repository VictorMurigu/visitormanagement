<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //
    public function login(){

        return view('auth.login');

    }
    public function registration(){
        return view('auth.registration');

    }
    public function registerUser(Request $request ){
        // return view('register-user');
        echo 'value posted';
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|max:6'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->type=$request->role;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $result=$user->save();
        if($result){
         return back()->with('success','You have registered successfully');
        }else{
         return back()->with('fail','Results not registered');
        }
    }

    public function loginUser(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
}