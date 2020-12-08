<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Home;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //

    public function addcomment(){
        $posts=Post::select("id","path","image_name","user_id")->where('user_id',Auth::id())->get();
        $comments=Comment::select("comment_content","user_id","post_id")->where('post_id',Auth::id())->get();
        // dd("helo");

        return view('Instapages.home')->with(['posts'=>$posts,'comments'=>$comments]);
    }

    public function home_savecomment($id,Request $request){
        $cmntcontent = $request->input_cmnt;

        // dd($cmntcontent);

        $c=new Comment;
        $c->comment_content=$cmntcontent;
        $c->user_id=Auth::id();
        $c->post_id=$id;
        $c->save();

        return redirect()->route('page.home');

    }
}
