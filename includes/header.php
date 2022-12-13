<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/header.css" />
</head>


<link rel="stylesheet" href="styles/header-style.css" />
<?php 
if (isset($_SESSION)) {
    $login = $_SESSION['login'];
} 
?>
<!--header-->
<header>
    <div id="box1">
        <div id="logo-box">
            <a href=index.php><img src="img/logo_black_letters.png" alt="logo"></a>
        </div>
    </div>
    <div id="box2">
    <!-- Si aucune Session n'est ouverte -->
    <?php if(!isset($_SESSION['login'])){ ?>
        <a href="index.php">Accueil</a>
        <a href="planning-!con.php">Planning</a>
        <a href="connexion.php"class="no_active" >Connexion</a>
        <a href="inscription.php"class="no_active" >Inscription</a>

    
    <!-- Si une Session user est ouverte -->
        <?php } else{?>
            <div>Vous etes connecté en tant que <?php echo $login ?></div>
            <a href="index_con.php">Accueil</a>
            <a href="reservation.php">Réservation</a>
            <a href="reservation-form.php">Réservez ici</a>
            <a href="planning.php">Planning</a>
            <a href="profil.php">Profil</a>
            
            <a href="deconnexion.php"class="no_active" >Déconnexion</a>
        <?php } ?>
    </div>
</header>
<!--header end-->