<?php
    session_start();
    include 'includes/header.php'; //insertion de header
    include 'includes/connect_db.php'; // connexion à la base de donnée
    $login = $_SESSION['login'];


    if (isset($_POST['submit'])) {
        if (isset($_POST['titre']) && ($_POST['debut'] !== 'choix') && ($_POST['fin'] !== 'choix') ){
            
            $titre = $_POST['titre'];
            $debut = $_POST['debut'];
            $fin = $_POST['fin'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            
            $requete = ("SELECT id FROM utilisateurs WHERE `login` = '$login' ");
           
            $reponse = $connect -> query($requete);
            
            
            $reponse_fetch_array = $reponse -> fetch_array();
            $user_id = $reponse_fetch_array['id'];

            
            $requete = ("INSERT INTO reservations (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre', '$description', '$date $debut', '$date $fin', '$user_id') ");
            $exec_requete = $connect -> query($requete);

            
            //header('Location: reservation-form.php?erreur=2');
        } else {
            header('Location: reservation-form.php?erreur=1');
        }
    }
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
        <?php 
            if(isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if($err == 1){
                        echo "<center><p style='color:red'>Choisissez l'heure svp</p></center>";
                    }
                    if($err == 2){
                        echo "<center><p style='color:green'>Les modifications ont été bien enregistrées</p></center>";
                    }                      
                } 
        ?>
        <form action="reservation-form.php" method="POST">
            <label for="titre">Titre de réservation</label>
            <input name="titre" type="text" placeholder="saisissez ici un titre pour votre réservation" required>
            <label for="debut">Heure de début</label>
            <select name="debut" required>
                <option >choix</option>
                <option value="08:00">08h00</option>
                <option value="09:00">09h00</option>
                <option value="10:00">10h00</option>
                <option value="11:00">11h00</option>
                <option value="12:00">12h00</option>
                <option value="13:00">13h00</option>
                <option value="14:00">14h00</option>
                <option value="15:00">15h00</option>
                <option value="16:00">16h00</option>
                <option value="17:00">17h00</option>
                <option value="18:00">18h00</option>
            </select>
            <label for="fin">Heure de fin</label>
            <select name="fin" required>
                <option>choix</option>
                <option value="09:00">09h00</option>
                <option value="10:00">10h00</option>
                <option value="11:00">11h00</option>
                <option value="12:00">12h00</option>
                <option value="13:00">13h00</option>
                <option value="14:00">14h00</option>
                <option value="15:00">15h00</option>
                <option value="16:00">16h00</option>
                <option value="17:00">17h00</option>
                <option value="18:00">18h00</option>
                <option value="19:00">19h00</option>
            </select>
            <label for="date" >Date</label>
            <input name="date" type="date" min="2022-12-13" max="2023-12-31" required>
            <label for="description" >Description :</label>
            <input name="description" type="text" required>
            <button name="submit" type="submit">Réserver</button>
        </form>
    </main>
</body>