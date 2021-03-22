<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use App\Http\Requests\User\UpdateRequest;

class FollowController extends Controller
{
    //フォローを表示
    public function follow($id){

        $user=User::find($id);
        $follow_model=new Follow;
        $follows=$user->follow;
        
        return view('show.show_follow',compact('follows','follow_model'));
    }

    //フォロワーを表示
    public function follower($id){
        $user=User::find($id);
        $follow_model=new Follow;
        $followers=$user->followed;
        // dd($follower);
        return view('show.show_follower',compact('followers','follow_model'));
    }

   

    //ajaxを用いてフォロー、フォロー解除を行う
    public function ajaxfollow(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $follow = new Follow;
        if ($follow->follow_exist($post_id)) {
            $follow = Follow::where('follow_id', $post_id)->where('followed_id', $id)->delete();
        } else {
            //空
            $follow = new Follow;
            $follow->follow_id = $post_id;
            $follow->followed_id = Auth::user()->id;
            $follow->save();
        }
        return response()->json();
    }
    // ajax(ここまで)
}

