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
            
            //récuperation de id_utilisateur de la db
            $requete = ("SELECT id FROM utilisateurs WHERE `login` = '$login' ");
            $exec_requete = $connect -> query($requete);
            $reponse_fetch_array = $exec_requete -> fetch_array();
            $user_id = $reponse_fetch_array['id'];
            
            //récuperation de la date et heure de debut de la db
            $requete2 = "SELECT debut FROM reservations";
            $exec_requete2 = $connect -> query($requete2);
            $reponse_fetch_array2 = $exec_requete2 -> fetch_all();
            $debut_bd = $reponse_fetch_array2;
            //var_dump($debut_bd);
            //$count = count($debut_bd);
            
            //echo$count.' '. " - c'est le nombre de lignes dans db ".'<br>';
            //echo $debut_bd[0][0].' '. 'date récupéré de db '.'<br>';
            
            //définition du format de la date et heure pour comparer dans la requete suivante
            $dateheure = ($date .' '. $debut );
            //var_dump($dateheure);
            //echo $dateheure. ' '. 'date de POST' .'<br>'.'<br>'.'<br>';
            $i = 0;
            
            //requete de echerche de nombre de repetition de la valeur d'input dans la db 
            $requete3 = "SELECT count(debut) FROM reservations WHERE debut ='". $dateheure. "'";
            $exec_requete3 = $connect -> query($requete3);
            $reponse_fetch_array3 = mysqli_fetch_array($exec_requete3);
            $count1 = $reponse_fetch_array3['count(debut)'];
            var_dump($count1);

            //définition de la condition d'insertion des données dans la db
            if($count1==0){
                echo 'réservation à bien été effectué';
                $requete4 = ("INSERT INTO reservations (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre', '$description', '$date $debut', '$date $fin', '$user_id') ");
                $exec_requete4 = $connect -> query($requete4);
                //header('Location: reservation-form.php?erreur=2');
            } else {
                echo 'créneau déjà pris';
            }            
            
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
                        echo "<center><p style='color:red'>Réservation à bien été effectué</p></center>";
                    }                      
                } 
        ?>
        <form action="reservation-form.php" method="POST">
            <label for="titre">Titre de réservation</label>
            <input name="titre" type="text" placeholder="saisissez ici un titre pour votre réservation" required>
            <label for="debut">Heure de début</label>
            <select name="debut" required>
                <option >choix</option>
                <option value="08">08h00</option>
                <option value="09">09h00</option>
                <option value="11">11h00</option>
                <option value="10">10h00</option>
                <option value="12">12h00</option>
                <option value="13">13h00</option>
                <option value="14">14h00</option>
                <option value="15">15h00</option>
                <option value="16">16h00</option>
                <option value="17">17h00</option>
                <option value="18">18h00</option>
            </select>
            <label for="fin">Heure de fin</label>
            <select name="fin" required>
                <option>choix</option>
                <option value="09">09h00</option>
                <option value="10">10h00</option>
                <option value="11">11h00</option>
                <option value="12">12h00</option>
                <option value="13">13h00</option>
                <option value="14">14h00</option>
                <option value="15">15h00</option>
                <option value="16">16h00</option>
                <option value="17">17h00</option>
                <option value="18">18h00</option>
                <option value="19">19h00</option>
            </select>
            <label for="date" >Date</label>
            <input name="date" type="date" min="2022-12-13" max="2023-12-31" required>
            <label for="description" >Description :</label>
            <input name="description" type="text" required>
            <button name="submit" type="submit">Réserver</button>
        </form>
    </main>
</body>