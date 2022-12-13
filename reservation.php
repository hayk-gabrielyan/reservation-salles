<?php
    session_start();
    include 'includes/header.php';
    $login = $_SESSION['login'];
    var_dump($_SESSION['login']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
    <link rel="stylesheet" href="styles/reservation.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div>Vous etes connecté en tant que <?php echo $login ?></div>
        <h1>Réservation</h1>
    </main>
</body>