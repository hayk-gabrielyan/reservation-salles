<?php
    session_start();
    include('includes/connect_db.php'); // connexion à la base de donnée
    $login = $_SESSION['login'];
    $title = "Reservation page";
    ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; //insertion de header ?>
    
<body>
<?php include ('includes/nav.php')?>
    <main>
        <h1>Réservations</h1>
    </main>
</body>

