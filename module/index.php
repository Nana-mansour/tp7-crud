<?php
require_once("../database/connexion.php");
$requete = "SELECT Module.*, Formation.nom_formation
            FROM Module
            INNER JOIN Formation
            ON Module.num_formation = Formation.num_formation";

$M = $pdo->prepare($requete);
$M->execute();
$modules=$M->fetchAll(PDO::FETCH_ASSOC);

?>
<!Doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Module</title>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <table>
            <tr>
                <th>Num_module</th>
                 <th>Nom</th>
                  <th>filière</th>
                  <th>Num_Formation</th>
                   
            </tr>
           <?php foreach($modules as $module){?>
             <tr>
                <td><?=$module["num_module"]?></td>
                 <td><?=$module["nom"]?></td>
                  <td><?=$module["filière"]?></td>
                  <td><?=$module["nom_formation"]?></td>
                   
            </tr>
           <?php }?>
        </table>
        
    
        </body>
</html>