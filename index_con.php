<?php 
    session_start();
    $login = $_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('includes/header.php')?>
</head>
<body>
    <?php include ('includes/nav.php')?>
        <main class="img_salle">
            <div class="main_index_con , background-color"  >
                <h1 id="test">Bienvenue <?php echo $login;?></h1>
                <p>Sur notre site, vous avez la possibilité de consulter le planning, de réserver une salle et de modifier votre réservation par la suite.
                Vous pouvez également modifier vos informations personnelles dans l'onglet 'Profil' .</p>
            </div>
        </main>
    <?php include ('includes/footer.php')?>
</body>
</html>