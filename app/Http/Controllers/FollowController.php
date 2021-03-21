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
    //
    public function follow($id){

        $user=User::find($id);
        $follow_model=new Follow;
        $follows=$user->follow;
        //dd($follow_users);
        return view('follow',compact('follows','follow_model'));
    }

    public function follower($id){
        $user=User::find($id);
        $follow_model=new Follow;
        $followers=$user->followed;
        // dd($follower);
        return view('follower',compact('followers','follow_model'));
    }

    public function add_follow($id){
        Auth::user()->follow()->attach($id);
        return redirect()->back();
    }


    public function destroy_follow($id){
        Auth::user()->follow()->detach($id);
        return redirect()->back(); 
    }

    public function ajaxfollow(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $follow = new Follow;

        // 空でない（既にいいねしている）なら
        if ($follow->follow_exist($post_id)) {
            //likesテーブルのレコードを削除
            $follow = Follow::where('follow_id', $post_id)->where('followed_id', $id)->delete();
        } else {
            //空
            $follow = new Follow;
            $follow->follow_id = $post_id;
            $follow->followed_id = Auth::user()->id;
            $follow->save();
        }

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
       
        //下記の記述でajaxに引数の値を返す
        return response()->json();
       
        //下記の記述でajaxに引数の値を返す
        return redirect();
    }
    // ajax実験(ここまで)
}

