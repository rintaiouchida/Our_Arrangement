<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Follow;
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

        return view('main',compact('follow','follower'));
    }

    public function follow($id){

        $user=User::find($id);
     
        $follows['id']=$user->follow->pluck('id');
        $follows['birthday']=$user->follow->pluck('birthday');
        $follows['email']=$user->follow->pluck('email');
        $follows['name']=$user->follow->pluck('name');
        $follows['picture']=$user->follow->pluck('picture');

        $i=0;
        while(!empty($follows['id'][$i])){
            $follow_users[$i]['name']=$follows['name'][$i];
            $follow_users[$i]['email']=$follows['email'][$i];
            $follow_users[$i]['birthday']=$follows['birthday'][$i];
            $follow_users[$i]['picture']=$follows['picture'][$i];
            $follow_users[$i]['id']=$follows['id'][$i];
            $i++;
        }
        //dd($follow_users);
        return view('follower',compact('follow_users'));
    }

    public function follower($id){

        $user=User::find($id);
     
        $follows['id']=$user->followed->pluck('id');
        $follows['birthday']=$user->followed->pluck('birthday');
        $follows['email']=$user->followed->pluck('email');
        $follows['name']=$user->followed->pluck('name');
        $follows['picture']=$user->followed->pluck('picture');

        $i=0;
        while(!empty($follows['id'][$i])){
            $follow_users[$i]['name']=$follows['name'][$i];
            $follow_users[$i]['email']=$follows['email'][$i];
            $follow_users[$i]['birthday']=$follows['birthday'][$i];
            $follow_users[$i]['picture']=$follows['picture'][$i];
            $follow_users[$i]['id']=$follows['id'][$i];
            $i++;
        }
        //dd($follow_users);
        return view('follower',compact('follow_users'));
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
