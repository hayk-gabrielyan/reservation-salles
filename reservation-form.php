<?php
    session_start();
    include 'includes/header.php'; //insertion de header
    include('includes/connect_db.php'); // connexion à la base de donnée
    $login = $_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
    <link rel="stylesheet" href="styles/reservation-form.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Formulaire de réservation</h1>
        <label for="titre">Titre de réservation</label>
        <input name="titre" type="text" placeholder="saisissez ici un titre pour votre réservation">
        <label for="debut">Choisissez l'heure de début</label>
        <select name="debut">
            <option >Select</option>
            <option value="canada">Canada</option>
            <option value="usa">USA</option>
        </select>
    </main>
</body>