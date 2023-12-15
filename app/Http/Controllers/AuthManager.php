<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Database\Seeder;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){

            $this->markAsOverdue($request->email);

            return redirect()->intended(route('home'));
        }else{
            return redirect(route('login'))->with("error","Login details are not valid");
        }
    }

    function registration(){
        return view('registration');
    }

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data)->syncPermissions(['Products','Checkout']);

        if(!$user){
            return redirect(route('registration'))->with("error","Registration failed, try again.");
        }
        return redirect(route('login'))->with("success","Registration success, Login to access the application.");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function markAsOverdue($email)
    {   
        $due_date = date('Y-m-d',strtotime('2024-02-02 10:10:10'));
        if( now() > $due_date ){
            $user = User::where('email', $email)->first();
            $user->overdue = 1;
            $user->save();
        }
        
    }
}
