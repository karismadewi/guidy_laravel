<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signUpPage(){
        return view('auth.signup');
    }
    public function loginPage(){
        return view('auth.login');
    }
    public function register(Request $request){
        $request->validate([
            'fname' =>'required',
            'lname' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:4'
        ]);
        
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/index")->withSuccess('You have log-in');
    }

    private function create(array $data)
    {
      return User::create([
        'fname' => $data['fname'],
        'lname' => $data['lname'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role'=>1
      ]);
    } 

    public function login(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:4'
        ]);
        $data = request()->except(['_token']);
        if(Auth::attempt($data)){
            return redirect()->intended("/index")->withSuccess('You have signed-in');
        }
       else{
        return redirect('/login')->withSuccess('You failed to login');
        }
    }
    
}   

