<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\User\UpdateRequest;

class FollowController extends Controller
{
    //
    public function follow($id){

        $user=User::find($id);
        $follows=$user->follow;
        //dd($follow_users);
        return view('follow',compact('follows'));
    }

    public function follower($id){
        $user=User::find($id);
        $followers=$user->followed;
        // dd($follower);
        return view('follower',compact('followers'));
    }

    public function add_follow($id){
        Auth::user()->follow()->attach($id);
        return redirect()->back();
    }


    public function destroy_follow($id){
        Auth::user()->follow()->detach($id);
        return redirect()->back(); 
    }
}
