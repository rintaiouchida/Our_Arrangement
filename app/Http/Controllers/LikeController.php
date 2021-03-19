<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;
use App\Http\Requests\User\UpdateRequest;

class LikeController extends Controller
{
    //
    // public function create($id){
    //     Auth::user()->like()->attach($id);
        //$post=Post::find($id);
        // $likes=$post->like;
        // dd($likes[0]);
        // foreach($likes as $like){
        //     dd($like);
        // }
    //     return redirect()->back();

    // }

    // public function destroy($id){
    //     Auth::user()->like()->detach($id);
    //     return redirect()->back();

    // }

    public function show($id){
        $post=Post::find($id);
        $likes=$post->like;

        return view('like_list',compact('likes'));
        //dd($likes[0]->name);
    }

    public function show_rank_bygenre($id){
        
        $count=0;
        $rank_num=1;
        $flies=Post::where('genre_id',$id)->get();
        foreach($flies as $fly){
            $fly->like_count=$count;
            foreach($fly->like as $like){
                $fly->like_count++;
            }$count=0;
        }
        $ranks=$flies->sortByDesc('like_count');
       
        return view('show_genre_rank',compact('ranks','rank_num'));
    }

    public function show_rank_byage($id){
        $posts=Post::all();
        $count=0;
        $rank_num=1;
        foreach($posts as $post){
            $post->like_count=0;
            foreach($post->like as $like){
                if($id==='1'){
                    if(Carbon::parse($like->birthday)->age<20){
                        $post->like_count++;
                    }
                }
                if($id==='2'){
                    if('20'<=Carbon::parse($like->birthday)->age && Carbon::parse($like->birthday)->age<30){
                        $post->like_count++;
                    }
                }
                if($id==='3'){
                    if('30'<=Carbon::parse($like->birthday)->age && Carbon::parse($like->birthday)->age<40){
                        $post->like_count++;
                    }
                }
                if($id==='4'){
                    if('40'<=Carbon::parse($like->birthday)->age && Carbon::parse($like->birthday)->age<50){
                        $post->like_count++;
                    }
                }
                if($id==='5'){
                    if('50'<=Carbon::parse($like->birthday)->age && Carbon::parse($like->birthday)->age<60){
                        $post->like_count++;
                    }
                }
                if($id==='6'){
                    if('60'<=Carbon::parse($like->birthday)->age){
                        $post->like_count++;
                    }
                }
            }
        }
        $posts_sort=$posts->sortByDesc('like_count');
        foreach($posts_sort as $post){
            if($post->like_count>0){
                $ranks[$count]=$post;
                $count++;
            }
        }

        if(empty($ranks)){$ranks=null;};

        return view('show_age_rank',compact('ranks','rank_num'));
    }
}

// dd(Carbon::parse('1987-02-11')->age);