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
use App\Models\Save;


class SaveController extends Controller
{
    //

    // public function Save_page($id){

    //     $saves=Save::where('id',$id)->get();

    //     return redirect()->route('page.home')->with('saves',$saves);
    // }


    public function save_page_post($id){
        $id1 = Auth::id(); 

        $issetsave=Save::where(['user_id'=>Auth::id(),'post_id'=>$id])->get();

        if($issetsave->count()>0){
            $save=Save::where('post_id',$id)->delete();
        }
        else{
            $s=new Save;
            $s->user_id=$id1;
            $s->post_id=$id;
            $s->save();
        }



        

        $saves=Save::where('post_id',$id)->get();
  
         return redirect()->route('page.home')->with('saves',$saves); 
      }

    
 
}
