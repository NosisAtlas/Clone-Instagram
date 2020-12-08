<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/inscription.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <title>Instagram</title>
</head>
<body>
    <div class="connexion">
            <h1 class="instagram-title">𝓘𝓷𝓼𝓽𝓪𝓰𝓻𝓪𝓶</h1>
            <button class="connect">Connect with Facebook</button>
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
            <a href="#">Create one</a>
        </div>
</body>
</html>