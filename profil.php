<?php
    session_start();
    include('includes/connect_db.php'); // connexion à la base de donnée
    
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    
    
    // requete pour récupérer les infos de la DB
    $catchInfos = $connect -> query("SELECT login, password FROM utilisateurs WHERE 'login' = '$login' ");
    $displayInfos = $catchInfos -> fetch_all();
    //var_dump($_POST);
    
    if (isset($_POST['submit'])){
        $newLogin = $_POST['login'];
        $confPassword = $_POST['confPassword'];
        $newPassword = $_POST['newPassword'];
        $newPassword2 = $_POST['newPassword2'];
        
        // si l'ancien pwd est le bon et que les nouveaux pwd correspondent
        if (($confPassword == $password) && ($newPassword == $newPassword2)){
            // faire la requete de mise à jour de la db avec les nouvelles valeurs
            $upInfo = $connect -> query("UPDATE utilisateurs SET login = '$newLogin' , password = '$newPassword' WHERE login = '$login'");
            echo 'Les modifications ont bien été prises en compte';
            // et sauver les nouvelles valeurs
            $_SESSION['login'] = $newLogin;
            $_SESSION['password'] = $newPassword;
            header('Location: profil.php?erreur=1');
        } else {
            header('Location: profil.php?erreur=2');
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; //insertion de header ?>

<body>
<?php include ('includes/nav.php')?>
    <main>
        <div>Vous etes connecté en tant que <?php echo $login ?></div>
        <h1>Modification de profil</h1>

        <form action="profil.php" method="POST">
            <label for="login">Changer le nom d'utilisateur</label>
            <input name="login" type="text" placeholder="Saisissez ici le nouveau nom d'utilisateur ..." value="<?=$login?>">
            <label for="confPassword">Confirmez l'ancien mot de passe</label>
            <input name="confPassword" type="password" placeholder="Saisissez ici l'ancien mot de passe ...">
            <label for="newPassword">Changer le mot de passe</label>
            <input name="newPassword" type="password" placeholder="Saisissez ici le nouveau mot de passe ...">
            <label for="newPassword2">Confirmez le mot de passe</label>
            <input name="newPassword2" type="password" placeholder="Confirmez le nouveau mot de passe ...">
            <button name="submit" type="submit" >Enregistrer les modifications</button>
        </form>
    <?php 
    
    if(isset($_GET['erreur'])) {
        $err = $_GET['erreur'] ;
        if ($err == 1) {
            echo 'Les modifications ont bien été prises en compte';
        }
        if ($err == 2) {
            echo 'mot de passe incorrect';
        }
    }

    ?>
    </main>
</body>
</html>
