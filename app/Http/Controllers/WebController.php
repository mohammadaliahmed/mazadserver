<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        $userId = Auth::id();
        $user=User::find($userId);
        return view('dashboard')->with('user',$user);


    }

    public function userslist(Request $request)
    {
        $users=User::get();
        return view('userslist')->with('users',$users);


    }
}
