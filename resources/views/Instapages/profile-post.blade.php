@extends('Instapages.profile')


@section('content2')


<div class="popup-gallery post-page d-flex flex-wrap">
            
@if(isset($posts))
            @foreach($posts as $post)
                <div class="post-img-page mr-3">
                   <a href="{{ $post->path }}" title="{{ $post->image_name }}"> <img src="{{ $post->path }}" alt="" class="post-img"></a>
                </div>
            @endforeach
        @endif
            <!-- <div class="post-img-page mr-3">
                <img src="{{ URL::to('imgs/Icons/markus-spiske-WUehAgqO5hE-unsplash.jpg') }}" alt="" class="post-img">
            </div>
            <div class="post-img-page mr-3">
                <img src="{{ URL::to('imgs/Icons/hermes-rivera-qbf59TU077Q-unsplash.jpg') }}" alt="" class="post-img">
            </div>
            <div class="post-img-page mr-3">
                <img src="{{ URL::to('imgs/Icons/hermes-rivera-qbf59TU077Q-unsplash.jpg') }}" alt="" class="post-img">
            </div>            -->
</div>


<div style="margin-top:100px;margin-left:500px">
    <a href="{{ route('page.profile-addpost2') }}" class="add-post-button"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
</div>
@endsection