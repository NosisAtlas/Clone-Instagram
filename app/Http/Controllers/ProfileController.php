<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Home;
use App\Models\Save;


class ProfileController extends Controller
{
    //

    public function profile(){
        $posts=Post::select("id","path","image_name","user_id")->where('user_id',Auth::id())->get();
        $comments=Comment::select("comment_content","user_id","post_id")->where('post_id',Auth::id())->get();
        
        return view('Instapages.profile')->with(['posts'=>$posts,'comments'=>$comments]);
    }

    public function profile_post(){
        $posts=Post::select("path","image_name")->where('user_id',Auth::id())->get();
        $users=User::where('id',Auth::id())->get();

        $user=User::find(Auth::id());
        $u=$user->users->count();
        // dd($u);

        $id=Auth::id();
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
        // $users_following=$user_following->count();
        // dd($user_following);

        return view('Instapages.profile-post')->with(['posts'=>$posts,'users'=>$users,'user_following'=>$user_following]);
    }

    public function profile_igtv(){
        $posts=Post::select("path","image_name")->where('user_id',Auth::id())->get();
        $users=User::where('id',Auth::id())->get();
        $id=Auth::id();
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
        return view('Instapages.profile-igtv')->with(['posts'=>$posts,'users'=>$users,'user_following'=>$user_following]);
    }

    public function profile_saved(){
        $posts=Post::select("path","image_name")->where('user_id',Auth::id())->get();
        $users=User::where('id',Auth::id())->get();
        $saves=Save::where('user_id',Auth::id())->get();
        $id=Auth::id();
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
        return view('Instapages.profile-saved')->with(['posts'=>$posts,'users'=>$users,'saves'=>$saves,'user_following'=>$user_following]);
    }

    public function profile_tagged(){
        $posts=Post::select("path","image_name")->where('user_id',Auth::id())->get();
        $users=User::where('id',Auth::id())->get();
        $id=Auth::id();
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
        return view('Instapages.profile-tagged')->with(['posts'=>$posts,'users'=>$users,'user_following'=>$user_following]);
    }

    public function profile_addpost(){
        $images= Post::all();
        $id=Auth::id();
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
        return view('Instapages.profile-post')->with(['images'=>$images,'user_following'=>$user_following]);
    }

    public function profile_edit(){
        $posts=Post::select("path","image_name")->where('user_id',Auth::id())->get();
        $users=User::where('id',Auth::id())->get();
        $id=Auth::id();
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

        return view('Instapages.edituserdata')->with(['posts'=>$posts,'user_following'=>$user_following]);
    }

    public function profile_editdata(Request $request){
        $username = $request->input_name;
        $bio = $request->input_bio;
        $email= $request->input_email;
        $avatar = $request->input_image;


        // dd($username);
        // dd($bio);
        // dd($email);
        // dd($avatar);


        
    
            // 1ere etape : récupérer le nom original de l'image
            $original_name =  $avatar->getClientOriginalName();
    
            // 2eme  etape:  récupérer le nom de l'image sans son extension
            $filename =  pathinfo($original_name,PATHINFO_FILENAME); 
    
            // 3eme  etape:  récupérer l'extension de l'image 
            $extension =  $avatar->getClientOriginalExtension(); 
    
            // 4eme etape : créer un nouveau nom pour l'image
            $filename_store = $filename.time().'.'.$extension;

            // 5eme etape : pousser l'image vers sa destination
            $avatar->move('uploads', $filename_store);

        $u = User::where('id', Auth::id());
       
        $u->update([
        'name'=>$username,
        'bio'=>$bio,
        'email'=>$email,
        'profile_photo_path'=>'uploads/'.$filename_store
        ]);


        // dd("done");

        return redirect()->route('page.profile-post');
    }

    
}
