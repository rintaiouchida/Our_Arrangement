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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        // フォロー、フォロワーの数を取得
        $follow=0;
        $follower=0;

        $follow_id=$user->follow->pluck('id');
        $followed_id=$user->followed->pluck('id');

        //dd($follow_id);
        while(!empty($follow_id[$follow])){
            $follow++;
        }
        while(!empty($followed_id[$follower])){
            $follower++;
        }
        //フォロー、フォロワーの数を取得(ここまで)


        //フォローしている人の投稿を取得
        $i=0;
        $user=User::find(Auth::id());
        $follows2=$user->follow;
        foreach($follows2 as $follow2){
            $follow_id[$i]=$follow2->id;
            $i++;
        }$i=0;
        

       $all_post=Post::all();
       $all_post=$all_post->sortByDesc('id');
       //dd($all_post);
       
       foreach($all_post as $one_post){
        foreach($follow_id as $one_id){
            if($one_post->user_id===$one_id){
                $posts[$i]=$one_post;
                $i++;
            }
        }
       }
       //dd($posts);
        //フォローしている人の投稿を取得(ここまで)

        return view('main',compact('follow','follower','posts'));
    }

 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $contact=Auth::user();
        return view('edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $contact=Auth::user();


        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        if(!empty($request->input('password'))){
            $contact->password=Hash::make($request->input('password'));
        }
        if(!empty($request->input('picture'))){
            $contact->picture=$request->input('picture');
        }
        $contact->birthday=$request->input('birthday');
        
        $contact->save();
        return view('/update_confirm',compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function destroy()
    {
        //
        $contact=Auth::user();
        $confirm=$contact;
      
      
        $contact->delete();
        return view('destroy_confirm',compact('confirm'));
    }
}
