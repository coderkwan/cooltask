<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    function login(Request $req){
        $validated = $req->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            $req->session()->regenerate();
            return redirect()->intended('home');
        }else{
            return back()->withErrors([
                 'The provided credentials do not match our records.',
            ])->onlyInput('email','password');
        }
 
    }

    public function register(Request $req){
        $validated = $req->validate([
            'name' => 'string|required|max:80',
            'email' => 'email|required|unique:users',
            'password' => 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/|required',
        ], $messages = ['password.regex'=> "Password must be atlest 8 characters, include a number, a letter and a special charecter."]);

        $user = new User($validated);
        $user->save();

        if (Auth::attempt($validated)) {
            $req->session()->regenerate();
 
            return redirect()->intended('home');
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email','name');
        }
 
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/');
    }

    function delete(Request $request){
        $user = User::find(Auth::id());
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $user->delete();

        return redirect('/');
    }

  function update(Request $request){
        $user = User::find(Auth::id());

        $user->name = $request->input("name");
        $user->email = $request->input("email");

        if(strlen(trim($request->input("password"))) > 0){
            $user->password = $request->input("password");
        }

        $user->save();

        return Redirect::back();
    }

    function getDetails(){
        $user = User::find(Auth::id());
        return view('profile')->with('data', $user);
    }
}
