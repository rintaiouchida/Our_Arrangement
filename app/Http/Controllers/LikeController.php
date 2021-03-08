<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;
use App\Http\Requests\User\UpdateRequest;

class LikeController extends Controller
{
    //
    public function create($id){
        Auth::user()->like()->attach($id);
        //$post=Post::find($id);
        // $likes=$post->like;
        // dd($likes[0]);
        // foreach($likes as $like){
        //     dd($like);
        // }
        return redirect()->back();

    }

    public function destroy($id){
        Auth::user()->like()->detach($id);
        return redirect()->back();

    }

    public function show($id){
        $post=Post::find($id);
        $likes=$post->like;

        return view('like_list',compact('likes'));
        //dd($likes[0]->name);
    }
}
