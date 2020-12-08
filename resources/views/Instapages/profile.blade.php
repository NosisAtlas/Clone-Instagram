@extends('Instapages.Instagramhome')

@section('content')
        
    <div class="profile-details">
        <div class="profile-df-det-details">
        <!-- @if(isset(Auth::user()->profile_photo_path))?{{ Auth::user()->profile_photo_path }}:{{ URL::to('imgs/Icons/profile-avatar.png') }}@endif -->
            <img src="{{ Auth::user()->profile_photo_path }}" alt="" class="profile-pic">
            <div class="profile-det-details">
                <h5 id="user">{{Auth::user()->name}}</h5>
                <a href="{{ route('page.profile-edit') }}" class="edit-profile">Edit Profile</a>
                <a href=""><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="account-details">
            <h5>{{ $posts->count()}} posts</h5>
            <h5>{{ Auth::user()->users->count() }} followers</h5>
            <h5>{{ count($user_following) }} following</h5>
        </div>
        <div class="account-bio">
            <h5>{{Auth::user()->name}}</h5>
            <p>{{Auth::user()->bio}}</p>
            <a><strong>Following:</strong></a> <a>@foreach($user_following as $element){{$element->name}} @endforeach . . .</a> <br>
            <a><strong>Followers:</strong></a> @foreach( Auth::user()->users as $element)<a>{{$element->name}}</a>@endforeach
        </div>
    </div>

    <div class="details-profile">
        <div class="nav-keys">
            <a href="{{ route('page.profile-post') }}"><i class="fa fa-th" aria-hidden="true"></i>PUBLICATIONS</a>
            <a href="{{ route('page.profile-igtv') }}"><i class="fa fa-television" aria-hidden="true"></i>IGTV</a>
            <a href="{{ route('page.profile-saved') }}"><i class="fa fa-bookmark-o" aria-hidden="true"></i>SAVED</a>
            <a href="{{ route('page.profile-tagged') }}"><i class="fa fa-tags" aria-hidden="true"></i>TAGGED</a>
        </div>

        @yield('content2')
        
        
    </div>
@endsection