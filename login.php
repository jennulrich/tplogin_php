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


echo "<form method='POST' action='logout.php'>";
echo "<input type='submit' value='DECONNEXION' class='btn btn-primary'>";
echo "</form>";

echo "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" />
";

echo "<h1 style='text-align: center;'>Liste des utilisateurs</h1>";

echo "<div style='margin-right: '>";
$row = 1;
if (($handle = fopen("csv/file.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "</p>\n";
        $row++;
        //for ($c=0; $c < $num; $c++) {
            echo $data[0] . "\n";
        //}
        }
    fclose($handle);
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
</head>
<body style="padding-left: 50px;">
<form method="post" action="index.php" class="form-horizontal">
    <div class="form-group">
        <h1>Ajouter un utilisateur</h1>
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
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </div>

</form>
</body>
</html>















