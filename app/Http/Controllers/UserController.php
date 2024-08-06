<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile($name){
        $user = User::where('name', '=', $name)->firstOrFail();
        return view('profile', compact('user'));
    }
}
