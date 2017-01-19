<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile($userId){
        $user=User::find($userId);
        //dd($user);

        return view('articles.timeline', compact('user'));

    }
}
