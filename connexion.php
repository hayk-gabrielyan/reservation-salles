<?php
    include('includes/connect_db.php'); // connexion à la base de donnée
?>

<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php'); //insertion de header ?>

<body>
    <?php include ('includes/nav.php')?>
    <main>
        <form action="login_check.php" method="POST" id="connexion_form">  
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
    </main>
</body>
</html>
