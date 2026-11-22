<?php
require_once("../database/connexion.php");
$requete="SELECT * FROM Formation";
$F = $pdo->prepare($requete);
$F->execute();
$Formations=$F->fetchAll(PDO::FETCH_ASSOC);

?>
<!Doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Formation</title>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <table>
            <tr>
                <th>Num_Formation</th>
                 <th>Nom</th>
                  <th>Date du début</th>
                   
            </tr>
           <?php foreach($Formations as $Formation){?>
             <tr>
                <td><?=$Formation["num_formation"]?></td>
                 <td><?=$Formation["nom_formation"]?></td>
                  <td><?=$Formation["date_debut"]?></td>
                  
            </tr>
           <?php }?>
        </table>
        
    
        </body>
</html>