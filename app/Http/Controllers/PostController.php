<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Step;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index(){
        $i=0;
        $user=User::find(Auth::id());
        $follows=$user->follow;
        foreach($follows as $follow){
            $arrs[$i]=$follow->id;
            $i++;
        }$i=0;
        $post=Post::find($arrs);
     

      
      
       return view('show',compact('post'));
    }

    public function post(){
        return view('post');
    }

    public function store(Request $request){
        $post =new Post;
        
        $path=Storage::disk('s3')->putFile('/test', $request['picture'], 'public');
        $post->name=$request['name'];
        $post->user_id=Auth::id();
        $post->genre_id=$request['genre'];
        $post->material=$request['material'];
        $post->icon_picture=Storage::disk('s3')->url($path);
      
        $post->arrange_origin=$request['arrange_origin'];
        $post->save();
        $step_num=1;
        $id=$post->id;

        return view('about',compact('id','step_num'));

    }

    public function store_about(Request $request){
        $step =new Step;
        $step->post_id=$request['id'];
        $step->step_num=$request['step_num'];
        $step->title=$request['name'];
        $step->about=$request['about'];      
        $path=Storage::disk('s3')->putFile('/test', $request['picture'], 'public');
        $step->picture=Storage::disk('s3')->url($path);
        $step->save();

        if(isset($request['next'])){
            $id=$request['id'];
            // dd($request['step_num']);
            $step_num=$request['step_num']+1;
            return view('about',compact('id','step_num'));
        }
        else if(isset($request['end'])){
            return view('top');
            // aaa/
        }
        $id=$step->post_id;
        dd($id);
    }

    public function show($id){
        $post=Post::find($id);
        $steps=$post->step;
        return view('show_about',compact('steps','post'));
    }
}
