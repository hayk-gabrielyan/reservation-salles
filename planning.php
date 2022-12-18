<?php
    session_start();
    include('includes/connect_db.php'); // connexion à la base de donnée
    
    $login = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/header.php'; ?>
    
<body>
<?php include ('includes/nav.php')?>
    <main>
        <h1>Planning</h1>
        

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

    </main>
</body>
</html>
