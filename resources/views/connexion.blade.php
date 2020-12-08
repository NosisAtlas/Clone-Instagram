@extends('Landing')

@section('content')
<div class="phones">
        <img class="iphone black-iphone" src="{{ URL::to('imgs/Black-Iphone-Insta.png') }}" alt="" >
        <img class="iphone white-iphone" src="{{ URL::to('imgs/White-Iphone-Insta.png') }}" alt="" >
    </div>

    <div class="connexion">
        <h1 class="instagram-title">𝓘𝓷𝓼𝓽𝓪𝓰𝓻𝓪𝓶</h1>
        <form action="" method="post">
            <input class="input input-username" type="text" placeholder="Numero de téléphone, nom d'utilisateur ou addresse email">
            <input class="input input-pass" type="text" placeholder="Mot de passe">
            <input class="input-submit" type="submit" value="Connexion">
        </form>
        <div class="or">
            <h3>OR</h3>
        </div>

        <div class="fb-connexion">
            <a href="#" class="fa fa-facebook"></a>
            <h4>Connect with Facebook</h4>
        </div>
        <div class="passforgot">
            <a href="#">forgot password?</a>
        </div>
    </div>

    <div class="inscription">
        <h4>You don't have an account?</h4>
        <a href="{{ url('/inscription') }}">Create one</a>
    </div>
@endsection