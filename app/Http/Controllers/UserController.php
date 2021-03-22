<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Like;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //メイン画面に遷移
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
            $follow_id2[$i]=$follow2->id;
            $i++;
        }$i=0;
        
        $all_posts=Post::all();
      
        $all_post=$all_posts->sortByDesc('id');
       //dd($posts);
       
       
       foreach($all_post as $one_post){
        if(!empty($follow_id2)){
            foreach($follow_id2 as $one_id){
                if($one_post->user_id===$one_id){
                    $posts[$i]=$one_post;
                    $i++;
                }
            }
        }
       }
       if(empty($posts)){
           $posts=null;
       }
       $like_model=new Like;
       
       //dd($posts);
       
       //dd($posts);
        //フォローしている人の投稿を取得(ここまで)
      

        return view('main',compact('follow','follower','posts','like_model'));
    }

    //選択したユーザーのアカウント情報を表示
    public function show_account($id){
        $user=User::find($id);
        $follow_model=new Follow;
        return view('show.show_account',compact('user','follow_model'));
      
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

     //アカウント内容更新画面に遷移
    public function edit_account()
    {
        //
        $contact=Auth::user();
        return view('update.edit_account',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //アカウント内容の更新
    public function update_account(Request $request)
    {
        //
        $contact=Auth::user();
        $contact->name=$request['name'];
        $contact->email=$request['email'];

        if(!empty($request['password'])){
            $contact->password=Hash::make($request['passwprd']);
        }


        if(!empty($request['picture'])){
            $path=Storage::disk('s3')->putFile('/test', $request['picture'], 'public');
            $contact->picture=Storage::disk('s3')->url($path);
        }
        $contact->birthday=$request['birthday'];
        
        $contact->save();
        return view('update_confirm',compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    //アカウントを削除
    public function destroy()
    {
        //
        $contact=Auth::user();
        $confirm=$contact;
      
      
        $contact->delete();
        return view('destroy_confirm',compact('confirm'));
    }
}

