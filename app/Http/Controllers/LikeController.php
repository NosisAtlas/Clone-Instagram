<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home;
use App\Models\Profile;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;


class LikeController extends Controller
{
    //
    public function like_page($id){
        return redirect()->route('page.home');
    }


    public function like(Request $request ){

        $id1=Auth::id(); 

        $issetlike=Like::where(['user_id'=>Auth::id(),'post_id'=>$request->post_id])->get();
        if($issetlike->count()>0){

            $issetlike[0]->delete();
            // dd($like);
        }
        else{
            //    dd('testerror');
                $l=new Like;
                $l->user_id=$id1;
                $l->post_id=$request->post_id;
                $l->save();
        }


        // $l=new Like;
        // $l->user_id=$id1;
        // $l->post_id=$id;
        // $l->save();

        $nombre = Post::find($request->post_id)->likes->count() ; 
 
        return response()->json(['nombre' => $nombre,'bool' => $issetlike->count()]); 
     }
}
