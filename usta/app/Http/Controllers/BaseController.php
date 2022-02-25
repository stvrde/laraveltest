<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Match;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function getGuestHome () {
        return view('guest');
    }

    public function postLogin(Request $request) {
        if (Auth::attempt(['name'=>$request['username'],'password' => $request['password'], 'isAdmin' => 1])) {
            return redirect()->route('admin.home'); //ili nesto tako
        }
        else if (Auth::attempt(['name'=>$request['username'],'password' => $request['password'], 'isAdmin'=> 0])) {
            return redirect()->route('home');
        }
        else {
            return redirect()->route('guestHome')->with(['fail'=> 'Wrong username or password']);
        }
    }

    public function getRegister() {
        return view('register');
    }

    public function postRegister(Request $request) {

        $this->validate($request, [
            'username'=>'required|alpha|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|numeric',
            'password' => 'required|same:repeat',
        ]);

        $user = new User();
        $user->name=$request['username'];
        $user->email=$request['email'];
        $user->age=$request['age'];
        $user->password=bcrypt($request['password']);
        $user->mmr= 100;
        $user->save();

        return redirect()->route('guestHome');

    }

}
