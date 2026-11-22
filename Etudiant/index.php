<?php
require_once("../database/connexion.php");
$requete = "SELECT Etudiant.*, Formation.nom_formation
            FROM Etudiant
            INNER JOIN Formation
            WHERE Etudiant.num_formation = Formation.num_formation";
$E = $pdo->prepare($requete);
$E->execute();
$Etudiants=$E->fetchAll(PDO::FETCH_ASSOC);

?>
<!Doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Etudiant</title>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <table>
            <tr>
                <th>Id_Etudiant</th>
                 <th>Nom</th>
                  <th>Prénom</th>
                   <th>num_formation</th>
            </tr>
           <?php foreach($Etudiants as $Etudiant){?>
             <tr>
                <td><?=$Etudiant["id_etudiant"]?></td>
                 <td><?=$Etudiant["nom"]?></td>
                  <td><?=$Etudiant["prenom"]?></td>
                  <td><?=$Etudiant["num_formation"]?></td>
            </tr>
           <?php }?>
        </table>
        <input type="submit" value="Envoyer">
    
        </body>
</html>