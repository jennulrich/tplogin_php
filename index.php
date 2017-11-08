<?php

session_start();

function redirect($url) {
    header("Location: $url");
    exit();
}

if(isset($_POST['submit']))
{
    //si les champs username ou password sont vides on redirige sur la page auth.php
    if(empty($_POST['username']) || empty($_POST['password']))
    {
        //redirect("http://localhost/PHP/LOGIN/auth.php");
        $_SESSION["error"] = "Veuillez remplir tous les champs !";
    }
    else
    {
        require "login.php";
        redirect("http://localhost:8888/tplogin_php/login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body class="bg">
<div class="container">
    <header>
        <h1>Formulaire de connexion</h1>
    </header>
    <section>
        <form method="post" action="login.php" class="form-horizontal">
            <div class="form-group">
                <!--<label for="inputEmail" class="col-sm-2 col-push-sm-2">Nom d'utilisateur</label>-->
                <div class="col-sm-4 col-sm-push-4">
                    <input name="username" type="text" class="form-control" id="inputUsername" required>
                </div>
            </div>
            <div class="form-group">
                <!--<label for="inputPassword" class="col-sm-2">Mot de passe</label>-->
                <div class="col-sm-4 col-sm-push-4">
                    <input type="password" class="form-control" id="inputPassword" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 button">
                    <button type="submit" class="btn btn-primary" name="submit">S'inscrire</button>
                </div>
            </div>
        </form>
            <?php if(isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger">
                    <p class="text-center"><?= $_SESSION["error"] ?></p>
                    <?php unset($_SESSION['error']) ?>
                </div>
            <?php endif ?>
    </section>
</div>

<?php //var_dump($_POST) ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>