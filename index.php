<?php

function redirect($url) {
    header("Location: $url");
    exit();
}

//si les champ username, email, password ou confirm_password sont vides
if(empty($_POST['username']) || empty($_POST['password']))
{
    //on reste sur la page index
    echo "Merci de remplir tous les champs";
} else {
    //une fois que l'utilisateur s'est enregistré il est redirigé sur la page de confirmation
    require "login.php";
    redirect("http://localhost:8888/tp_login/login.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>
<div class="container">
    <header>
        <h1>Formulaire de connexion</h1>
    </header>
    <section>
        <form method="post" action="index.php" class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2">Nom d'utilisateur</label>
                <div class="col-sm-3">
                    <input name="username" type="text" class="form-control" id="inputUsername" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2">Mot de passe</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="inputPassword" name="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
            </div>

        </form>
    </section>
</div>

<?php //var_dump($_POST) ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>