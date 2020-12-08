@extends('Instapages.Instagramhome')

@section('content')

<div class="stories">
        <div id="gallery" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item active">
                    <div class="row">
                            @foreach($user_following as $element)
                            <div class="col">
                                <a href="#"><img class="story-avatar avatar " src="{{ $element->profile_photo_path }}" alt=""></a>
                            </div>
                            @endforeach
                    </div>
                </div>

            </div> 

        </div>  
</div>



    <!-- <div class="container-flex" style="display:flex;justify-content:center; align-items:center"> -->
    @if(isset($postsall))
            @foreach($postsall as $post)
               
            
    <div class="feed">
            <div class="feed-header">
                <a href="{{ route('page.profile-post') }}"><img class="feed-avatar avatar " src="{{ $post->user->profile_photo_path }}" alt=""></a>
                <a href="#" style="margin-right: 450px;"><h5>{{ $post->user->name }}</h5></a>
                <a href="#"><h1 class="dots">...</h1></a>
            </div>
            <div class="feed-content">
                <img src="{{ $post->path }}" alt="">
            </div>
            <div class="feed-details">
                <div class="icons-detail">
                    <div class="allshare">
                        <form id="like_form" class="d-inline" action="{{ route('page.post-like',['id' => $post->id]) }}" method="post">
                            @csrf
                               <input type="hidden" name="post_id"  value="{{$post->id}}" id="post">
                                <button type="submit" name="likesd" style="border:none;background:none;margin: 10px 20px">
                                @if($boolsliketab[$post->id] == 1) 
                                    <i  id ="heart-like{{$post->id}}" class="fa fa-heart-o fa-2x " aria-hidden="true" style="color:red;"></i>
                                @else 
                                    <i  id ="heart-like{{$post->id}}" class="fa fa-heart-o fa-2x " aria-hidden="true"></i>
                                @endif
                                </button>
                        </form>
                        <button style="border:none;background:none;margin: 10px 20px"><i class="fa fa-comment-o fa-2x" aria-hidden="true"></i></button>
                        <button style="border:none;background:none;margin: 10px 20px"><i class="fa fa-paper-plane-o fa-2x" aria-hidden="true"></i></button>
                    </div>
                    <div class="share">
                        <form class="d-inline" action="{{ route('page.post-save',['id' => $post->id]) }}" method="post">
                        @csrf
                                    <button type="submit" name="likesd" style="border:none;background:none;margin: 10px 20px">
                                    @if(isset($saves))
                                        <i class="fa fa-bookmark fa-2x" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-bookmark-o fa-2x" aria-hidden="true"></i>
                                    @endif
                                    </button>
                        </form>
                    </div>
                </div>
                <div class="likes {{$post->id}}" >{{ $post->likes->count() }} like</div>
                <div class="cap-users" id="cap-users">
                    <div class="desc">
                        <h5>{{ $post->user->name }}</h5>
                        <p>{{ $post->image_name }}</p>
                    </div>
                    @if(count($post->comments) >0)
                    <!-- <button type="button" onclick="showComments()" value="click" style="margin-left:30px;border:none;background:none" id="seecomments">See all comments</button> -->
                    <!-- <button style="margin-left:30px;border:none;background:none" id="seecomments">See all comments</button> -->
                   @endif
                     <div class="users-comments-container">
                        @if(isset($post->comments))
                            @foreach($post->comments->sortByDesc("created_at")->take(2) as $comment)
                        <div id="" class="users-comments users-comments-{{$post->id}} user-desc">
                            <a href="{{ route('page.profile-post') }}"><img class="feed-avatar avatar " src="{{ $comment->user->profile_photo_path }}" alt=""></a>
                            <h5>{{ $comment->user->name }}</h5>
                            <p>{{ $comment->comment_content }}</p>
                        </div>
                            @endforeach
                        @endif
                     </div>

                    <div class="input-comment">
                        <form action="{{ route('page.addcomment2',['id' => $post->id])}}" method="post">
                            @csrf
                            <input type="text" name="input_cmnt" id="" placeholder="Leave a comment...">
                            <input type="submit" class="inp-sub" value="Publish">
                        </form>
                    </div>
                </div>
            </div>
    </div>
    
    @endforeach
        @endif

    <div class="right-part">
        <div class="profile-short">
                <a href="{{ route('page.profile-edit') }}"><img class="short-avatar avatar " src="{{ Auth::user()->profile_photo_path }}" alt=""></a>
                <div class="usr-nam">
                    <h5>{{ Auth::user()->name }}</h5>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <a href="{{ route('page.profile-post') }}" style="cursor: pointer;"><h5 class="tog" style="margin-left:110px;">Toggle</h5></a>
        </div>

        <div class="suggest">
            <h5>suggestions for you</h5>
            <h5 class="sug-h5">See all</h5>

            @foreach($users->sortByDesc("created_at")->take(3) as $element)
            <div class="profile-short">
                <a href="{{ route('page.profile-post') }}"><img class="short-avatar avatar " src="{{ $element->profile_photo_path }}" alt=""></a>
                <div class="usr-nam">
                    <h5>{{$element->name}}</h5>
                    <p>{{ $element->bio }}</p>
                </div>
                <a href="{{ route('page.follow-users',['id' => $element->id]) }}"><h5 class="tog">Follow</h5></a>
            </div>
            @endforeach

        </div>

    </div>
<!-- </div> -->


<!-- AJAX GOOGLE CDN LINK -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

     
    //   const displayComments = document.querySelectorAll('#seecomments'); 
    //   displayComments.forEach( btnElement => {
    //       btnElement.addEventListener('click', function(){
    //             const com = document.querySelector(".users-comments-container"); 
    //             com.style.display = "none"; 

                 
    //         })
    //   })


    const forms = document.querySelectorAll('#like_form'); 
    forms.forEach( form => {

        form.addEventListener('submit', function(event){
            event.preventDefault(); 
            const post_id = this.querySelector("#post").value; 

            const formData = {
                post_id: post_id
            }; 

            $.ajaxSetup({
                               headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
            });

            $.ajax({
                url:"/home-like/", 
                method:"post", 
                data: formData, 
                success: function(serverData){
                    const selector = "." + post_id;
                    $(selector).html(serverData.nombre + "likes");
                   const like = "heart-like" + post_id ; 
                   const coeur = document.getElementById(like); 
                 //  console.log(coeur);
                   if(serverData.bool === 0){
                     coeur.style.color = 'red'; 
                   }else {
                    coeur.style.color = 'black'; 
                   }
                }, 
                error : function()
                {
                    console.log(" il y a eu une erreur"); 
                }
            })

        
        })
    })

       
    


        
    })
</script>
    
    @endsection