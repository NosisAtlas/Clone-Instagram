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



class HomeController extends Controller
{
    //

    public function home(){
        // $posts=Post::all();
        $comments=Comment::all();
        $users=User::all();
        $id=Auth::id();
        $authuser=Auth::user();
        $users=User::all();
        $user_following=[];
        
        for($i=0;$i<$users->count();$i++){
            for($j=0;$j<$users[$i]->users->count();$j++){
                $u=$users[$i]->users[$j];
                if($u->id==$id){
                    array_push($user_following,$users[$i]);
                }
                
                
            }
        }
        // dd($user_following->i);
        // $posts=Post::where(['user_id'=>Auth::id(),'users_following_id'=>$user_following,'post_id'=>$request->post_id])->get();

        // dd($comments);
        $postsall=[];
        $usersfollowi=Auth::user()->users;
       

        // dd($usersfollowi);
        // dd($usersfollowi->count());
        for($i=0;$i<count($user_following);$i++){
            // dd($usersfollowi[$i]->posts);
            for($j=0;$j<count($user_following[$i]->posts);$j++){
                // dd($pos);
                array_push($postsall,$user_following[$i]->posts[$j]);
                // $postsall[$i]=$pos;
            }
        }
        // dd($postsall);


        // for($i=0;$i<Auth::id()->users->count();$i++){
        //     $usersfol=Auth::id()->users->count();
        //     dd($userfol);

        //     for($p=0;$p<$usersfol[$i]->posts->count();$p++){
        //         $pos=$users[$i]->posts[$p];
        //         array_push($posts,$users[$i]);
        //         // dd($posts);
        //     }
        // }




        $boolsliketab=[];
        // dd(count($postsall));
        for($i=0;$i<count($postsall);$i++){

            $issetlike=Like::where(['user_id'=>Auth::id(),'post_id'=>$postsall[$i]->id])->get();
            if($issetlike->count()>0){
                $boolsliketab[$postsall[$i]->id]=1;
            }
            else{
                $boolsliketab[$postsall[$i]->id]=0;
            }
        }
        // dd($boolsliketab);
        return view('Instapages.home')->with(['postsall'=>$postsall,'comments'=>$comments,'users'=>$users,'user_following'=>$user_following,'boolsliketab'=>$boolsliketab]);
    }


    public function logout(){

        Auth::logout();
        return redirect('/login');
    }


    public function following($id){

        $u=User::find($id);
        $u->users()->attach(Auth::id());

        return redirect()->route('page.home');
    }




    
}
