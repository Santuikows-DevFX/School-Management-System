<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller {

    public function home() {

        return view('home');
    }

    public function checkData(Request $request) {

        // check if the field are empty
        $request->validate([ 

            'email' => 'required',
            'password' => 'required|alphanum|min:6'

        ]);  

        $userdata = array(

            'email' => $request->get('email'),
            'password' => $request->get('password')


        );

        if(Auth::attempt($userdata)) {

            return view('welcome');

        }else {

            return back()->with('error', 'Incorrect USER or PASS!');

        }

    }

}