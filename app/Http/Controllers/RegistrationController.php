<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create ()
    {
        return view('sessions.create');
    }

    public function store ()
    {
//        validate
        $this->validate(request(),[
            'name'     =>  'required',
            'email'    =>  'required|email',
            'password' =>  'required|confirmed'
        ]);

        //create

        $user = User::create(request(['name','email','password']));



        auth()->login($user);

        return redirect()->home();
        
    }
}
