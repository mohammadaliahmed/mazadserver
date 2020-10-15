<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;
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

    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get();

        $html = "<option value=''>Select State</option>";
        foreach($states as $state)
        {
            $html .= "<option value='".$state->id."'>".$state->name."</option>";
        }
        
        return response()->json([
            'html' => $html
        ]);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();

        $html = "<option value=''>Select City</option>";
        foreach($cities as $city)
        {
            $html .= "<option value='".$city->id."'>".$city->name."</option>";
        }
        
        return response()->json([
            'html' => $html
        ]);
    }
}
