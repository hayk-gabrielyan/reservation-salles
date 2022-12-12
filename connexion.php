<?php
    include('includes/connect_db.php'); // connexion à la base de donnée
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <form action="verif.php" method="POST">  
        <h2>Connexion</h2>
        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="text" placeholder="Nom d'utilisateur" name="login" >
        </div>
        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" placeholder="Mot de passe" name="password" >
        </div>
        <button type="submit" name="submit" class="button">Se connecter</button>
    </form>
</body>
</html>
