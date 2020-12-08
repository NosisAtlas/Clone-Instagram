<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/instagramhome.css') }}">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <title>Home</title>
</head>
<body>
    <div class="header">
        <a class="logo" href="{{ route('page.home') }}"><img class="instagram-logo" src="{{ URL::to('imgs/Instagram_logo.png') }}" alt=""></a>
        <input type="text" class="inputsearch" name="input-search" id="" placeholder="Search">
        <a href="{{ route('page.home') }}"><img class="icon home-icon" src="{{ URL::to('imgs/Icons/home.png') }}" alt=""></a>
        <a href="#"><img class="icon dm-icon" src="{{ URL::to('imgs/Icons/share.png') }}" alt=""></a>
        <a href="#"><img class="icon navigate-icon" src="{{ URL::to('imgs/Icons/navigate.png') }}" alt=""></a>
        <a href="#"><img class="icon heart-icon" src="{{ URL::to('imgs/Icons/heart.png') }}" alt=""></a>

        <div class="dropdown" style="">
            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="session-icon" src="{{ Auth::user()->profile_photo_path }}" alt="">

            </a>

            <div style="margin-right:30px;" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('page.profile-post') }}"><i class="fa fa-user-circle fa-x mt-2 mr-2"></i>Profile</a>
                <a class="dropdown-item" href="{{ route('page.profile-saved') }}"><i class="fa fa-bookmark-o fa-x mt-2 mr-2"></i>Saves</a>
                <a class="dropdown-item" href="#"><i class="fa fa-cogs fa-x mt-2 mr-2"></i>Settings</a>
                <a class="dropdown-item" href="#"><i class="fa fa-refresh fa-x mt-2 mr-2"></i>Switch Account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('page.logout') }}">Disconnect</a>
            </div>
            </div>
    </div>

    @yield('content')







    <script src="jquery-3.5.1.min.js"></script>
    <script src="{{ URL::to('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::to('js/popupgallery.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</body>
</html>