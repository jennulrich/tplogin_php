<?php

session_start();

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

$data = [
    [
        "username"=>$_POST['username'],
        "password"=>$_POST['password']
    ]
];

if(empty($_POST['username']) || empty($_POST['password'])) {
    //
} else {
    $fp = fopen("csv/file.csv", "a+");

    foreach ($data as $csv){
        fputcsv($fp, $csv);
    }

    fclose($fp);
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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<header style="padding: 10px">
    <form method='POST' action='logout.php' style="float: right">
        <input type='submit' value='DECONNEXION' class='btn btn-primary'>
    </form>
</header>
<div class="container">
    <h1 style='text-align: center;'>Liste des utilisateurs</h1>

    <div id='data'>
        <?php $row = 1;
        if (($handle = fopen("csv/file.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                ?>
                <div class='flex'>
                    <p>
                        <?php echo $data[0]; ?>
                    </p>
                </div>
                <?php
            }
            fclose($handle);
        }
        ?>

        <section style="border-radius: 10px; background-color: lightgrey; margin-bottom: 20px">
            <h1 style="text-align: center">Ajouter un utilisateur</h1>
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
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 button">
                        <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
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


</body>
</html>















