    <?php
    session_start();
    
    include 'includes/connect_db.php'; // connexion à la base de donnée
    $login = $_SESSION['login'];



    if (isset($_POST['submit'])) {
        if (isset($_POST['titre']) && ($_POST['debut'] !== 'choix') && ($_POST['fin'] !== 'choix') ){
            //déclaration de variables de POST
            $titre = $_POST['titre'];
            $debut = $_POST['debut'];
            $fin = $_POST['fin'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            $dt = new DateTime('now',new DateTimeZone('Europe/Paris'));
            //récuperation de id_utilisateur de la db
            $requete = ("SELECT id FROM utilisateurs WHERE `login` = '$login' ");
            $exec_requete = $connect -> query($requete);
            $reponse_fetch_array = $exec_requete -> fetch_array();
            $user_id = $reponse_fetch_array['id'];
            
            //récuperation de la date et heure de debut de la db
            $requete2 = "SELECT `debut`, `fin` FROM `reservations`";
            $exec_requete2 = $connect->query($requete2);
            $reponse_fetch_array2 = $exec_requete2->fetch_all();
            
            $i = 0;
            foreach ($reponse_fetch_array2 as $key => $value) {
                echo $reponse_fetch_array2[0][$i] .' - '. ' début de reservation No : '.$i.'' .'<br>';
                echo $reponse_fetch_array2[$i][0] .' - '. ' fin de reservation No : '.$i.'' .'<br>';
            $i++;

            }
            
            //var_dump($reponse_fetch_array2) ;
            echo  '<br>' . $reponse_fetch_array2[0][0] .' - '. ' début de 1ére reservation' . '<br>';
            echo $reponse_fetch_array2[0][1] .' - '. ' fin de 2éme reservation'. '<br>';
            echo $reponse_fetch_array2[1][0] .' - '. ' début de 1ére reservation'. '<br>';
            echo $reponse_fetch_array2[0][1] .' - '. ' fin de 2éme reservation'. '<br>'. '<br>';
            
            // $count = count($reponse_fetch_array2);
            // var_dump($count);
            
            //echo$count.' '. " - c'est le nombre de lignes dans db ".'<br>';
            //echo $reponse_fetch_array2[0][0].' '. 'date récupéré de db '.'<br>';
            
            //définition du format de la date et heure pour comparer dans la requete suivante
            $dateheure = ($date .' '. $debut );
            //var_dump($dateheure);
            //echo $dateheure. ' '. 'date de POST' .'<br>'.'<br>'.'<br>';
            
            //requete de recherche de nombre de repetition de la valeur d'input dans la db 
            $requete3 = "SELECT count(debut) FROM reservations WHERE debut ='". $dateheure. "'";
            $exec_requete3 = $connect -> query($requete3);
            $reponse_fetch_array3 = mysqli_fetch_array($exec_requete3);
            $count1 = $reponse_fetch_array3['count(debut)'];
            //var_dump($count1);

            // $is_saturday = date('l', $date) == 'Saturday';
            // $is_sunday = date('l', $date) == 'Sunday';
            // var_dump($is_saturday);

            //définition de la date minimum autorisée à réserver
            $date_min = date("Y-m-d", strtotime("today"));
            echo "date actuelle minimum possible : $date_min " . '<br>';
            echo "date de POST : $date" . '<br>';

            // définition de date et heure actuelle avec timezone EUROPE / PARIS
            
            //var_dump($dt) ;
            echo '<br>'.  "voici date et heure actuelle : " . $dt->format('d/m/Y H:i:s'). '<br>';
            
            echo "voici date et heure de debut de POST : ". date( "d/m/Y", strtotime($date)).' '. date( "s:H:i", $debut) . '<br>'. '<br>';
            echo "voici l'heure de fin de POST : ". date( "s", $fin ) . '<br>'. '<br>';
            $date_heure_debut = date( "d/m/Y", strtotime($date)).' '. date( "s:H:i", $debut);
            $date_heure_actuelle = $dt->format('d/m/Y H:i:s');
            
            //les conditions d'insertion dans la db
            if($count1==0 ) {

                //Vérification si l'utilisateur tente de réserver un samedi ou dimanche
                $date_debut = new DateTime($_POST['date']);
                $date_fin = new DateTime($_POST['date']);
                if($date_debut->format('D') == 'Sat' || $date_debut->format('D') == 'Sun'  || $date_fin->format('D') == 'Sat' || $date_fin->format('D') == 'Sun' ) {
                    var_dump($date_debut->format('D'));
                    echo "Nous sommes fermés les week-ends";
                } else {
                    if($debut < $fin && $debut != $fin){
                        //condition pour verifier que la date de réservation n'est pas antérieure à la date actuelle
                        if ($date_heure_debut /*POST*/ >= $date_heure_actuelle /*actuelle*/) {
                                echo 'réservation à bien été effectué';
                                $requete4 = ("INSERT INTO reservations (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre', '$description', '$date $debut', '$date $fin', '$user_id') ");
                                $exec_requete4 = $connect -> query($requete4);
                                //header('Location: reservation-form.php?erreur=2');
                        } else {
                            echo "Erreur : la date et(ou) heure choisie est une date antérieure à la date actuelle". '<br>'. '<br>';
                        }
                        
                    }
                    else{
                        echo "Erreur : heure de fin est antérieur ou égal à l'heure de debut";
                    }
                } 
                    
            } else {
                echo 'créneau déjà pris';
            }
                      
            
        } else {
            header('Location: reservation-form.php?erreur=1');
        }
    }
?>
<!------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------- PARTIE HTML --------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; //insertion de header ?>

<body>
<?php include ('includes/nav.php')?>
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
            <input name="titre" type="text" placeholder="titre de l'evenement" required>
            <label for="debut">Heure de début</label>
            <select name="debut" required>
                <option >choix</option>
                <option value="08">08h00</option>
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
            <label for="date">Date</label>
            <input name="date" type="date"  min=<?php $date_min ?> max="2023-12-31" required>
            <label for="description" >Description :</label>
            <input name="description" type="text" required>
            <button name="submit" type="submit">Réserver</button>
        </form>
    </main>
</body>