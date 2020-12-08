@extends('Instapages.profile')


@section('content2')


    <div class="post-page d-flex flex-wrap">
            
@if(isset($saves))
            @foreach($saves as $element)
                <div class="post-img-page mr-3">
                    <img src="{{ $element->post->path }}" alt="" class="post-img">
                </div>
            @endforeach

@else
<div class="igtv">
        <a href=""><i class="fa fa-bookmark-o" aria-hidden="true"></i></a>
        <h4 style="margin-left:420px">Save posts</h4>
        <p style="margin-left:340px">You can save as many posts as you want</p>
    </div>
@endif
</div>
@endsection