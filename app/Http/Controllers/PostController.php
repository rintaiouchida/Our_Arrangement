<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Step;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        if(!empty($request['picture'])){
            $path=Storage::disk('s3')->putFile('/test', $request['picture'], 'public');
            $picture=Storage::disk('s3')->url($path);
        }
        else{
            $picture='https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/pC9sHZzPYbhCvKSdX9dwWb0YGd4DlDa6zrwEH4Be.png';
        }
        $post->name=$request['name'];
        $post->user_id=Auth::id();
        $post->genre_id=$request['genre'];
        $post->material='';
        $i=0;
       
 
        while(!empty($request['material'.$i])){
            $post->material.='・'.$request['material'.$i].'<br>';
            $i++;
        }
       // dd($post->material);
        // $post->material=$request['material'];
        $post->icon_picture=$picture;
      
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
        if(!empty($request['picture'])){
            $path=Storage::disk('s3')->putFile('/test', $request['picture'], 'public');
            $picture=Storage::disk('s3')->url($path);
        }      
        else{
            $picture='https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/pC9sHZzPYbhCvKSdX9dwWb0YGd4DlDa6zrwEH4Be.png';
        }
        $step->picture=$picture;
        $step->save();

        if(isset($request['next'])){
            $id=$request['id'];
            // dd($request['step_num']);
            $step_num=$request['step_num']+1;
            return view('about',compact('id','step_num'));
        }
        else if(isset($request['end'])){
            $steps=Step::where('post_id',$request['id'])->get();
            $post=Post::find($request['id']);
            $step_num=1;
            return view('post_confirm',compact('post','steps','step_num'));
            // aaa/
        }
        $id=$step->post_id;
        dd($id);
    }

    public function show($id){
        $post=Post::find($id);
        $steps=$post->step;
        $like_model=new Like;
        return view('show_about',compact('steps','post','like_model'));
    }

    public function show_search(Request $request){

        $query=DB::table('posts');

        $count=0;
        $search=$request->input('name');
        $search_split=mb_convert_kana($search,'s');
        $search_split2=preg_split('/[\s]+/',$search_split,-1,PREG_SPLIT_NO_EMPTY);

        foreach($search_split2 as $value){
            $query->where('name','like','%'.$value.'%');
        }
       

        $query->orderBy('created_at','asc');
        $contacts=$query->paginate(20);
        foreach($contacts as $contact){
            $count++;
        }
        return view('show_search',compact('contacts','search','count'));
        
    }

    public function show_auth_like(){
        $user=User::find(Auth::id());
        $likes=$user->like->sortByDesc('created_at');
        return view('auth_like',compact('likes','user'));
    }
    public function show_auth_post(){
        $user=User::find(Auth::id());
        $posts=Post::where('user_id',$user->id)->get()->sortByDesc('created_at');
        return view('auth_post',compact('posts','user'));
    }


    // ajax実験
    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        $post = Post::findOrFail($post_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('like')->likes_count;
      
        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
       
        //下記の記述でajaxに引数の値を返す
        return redirect();
    }
    // ajax実験(ここまで)
    
}
