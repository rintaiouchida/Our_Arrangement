<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    //
    public function follow_exist($post_id){
        $exist = Follow::where('follow_id', '=', $post_id)->where('followed_id', '=', Auth::user()->id)->get();

        if (!($exist->isEmpty())) {
            return true;
        } else {
        // レコード（$exist）が存在しないなら
            return false;
        }
    }
}
