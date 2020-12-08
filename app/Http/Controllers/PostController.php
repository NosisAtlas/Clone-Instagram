<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    //

    public function profile_addpostpage(){

        return view('Instapages.profile-add-post');
    }


    public function profile_savepost(Request $request){
        
            $imgname = $request->image_nom;
            $img = $request->input_image;
            // dd($img);
    
            // 1ere etape : récupérer le nom original de l'image
            $original_name =  $img->getClientOriginalName();
    
            // 2eme  etape:  récupérer le nom de l'image sans son extension
            $filename =  pathinfo($original_name,PATHINFO_FILENAME); 
    
            // 3eme  etape:  récupérer l'extension de l'image 
            $extension =  $img->getClientOriginalExtension(); 
    
            // 4eme etape : créer un nouveau nom pour l'image
            $filename_store = $filename.time().'.'.$extension;



        //    Auth::user();

    
            // 5eme etape : pousser l'image vers sa destination
            $img->move('uploads', $filename_store);
    
            $album=new Post;
            $album->image_name=$imgname;
            $album->path='uploads/'.$filename_store;
            $album->user_id=Auth::id();

            $album->save();
    
            $images= Post::all();
    
    
            return redirect()->route('page.profile-post');
            
        
    }

    
}
