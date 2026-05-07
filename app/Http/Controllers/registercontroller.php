<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registercontroller extends Controller
{
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         "name" => 'required',
    //         'email' => 'requireed|email',
    //         'password' => 'required|min:6',
    //     ]);


    //     $register = new Register();
    //     $register->name = $request->name;
    //     $register->email = $request->email;
    //     $register->password = Hash::make($request->password);
    //     $register->save();
    //     if ($register::auth()->user()->id) {
    //         return redirect('login')->with('success', 'Register Successfully');
    //     } else {
    //         return redirect('register')->with('error', 'Not registered');
    //     }
    // }
}
