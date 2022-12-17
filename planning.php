<?php
    session_start();
    include 'includes/header.php';
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
    <link rel="stylesheet" href="styles/planning.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Planning</h1>
    </main>

<table border="1">
    <thead >
        <?php 
        $semaine = array('lundi','mardi', 'mercredi', 'jeudi','vendredi', 'samedi', 'dimanche') ;
        $i = 0;
        $j = 8;
        $k = 9;
        echo "<tr>";
        echo "<th> Créneaux </th>";
        while ($i < 7) {
            echo "<th>$semaine[$i]</th>";
            $i++;
        } 
        echo "</tr>";
        ?>
    </thead>
    <tbody>
        <?php 
        while ($j<=19) {
            echo "<tr>";
                echo "<td> ".$j."h"." "."à"." ".$k."h". "</td>";
                echo "<td> résérver </td>";
                echo "<td> résérver </td>";
                echo "<td> résérver </td>";
                echo "<td> résérver </td>";
                echo "<td> résérver </td>";
                echo "<td> résérver </td>";
                echo "<td> résérver </td>";
            echo "</tr>";
        $j++;
        $k++;
        }
        
        ?>
    </tbody>
</table>

</body>

