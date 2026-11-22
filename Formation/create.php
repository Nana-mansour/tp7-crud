
<?php
require_once("../database/connexion.php");

if(isset($_POST["envoyer"])) {

    $requete = "INSERT INTO Formation
                (nom_formation, date_debut)
                VALUES (?, ?)";

    $F = $pdo->prepare($requete);

    $F->execute([
        $_POST["nom_formation"],
        $_POST["date_debut"]
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter formation</title>
        <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<h1>Ajouter une formation</h1>

<form method="POST">

    Nom de formation :
    <input type="text" name="nom_formation" required><br><br>

    Date de début :
    <input type="date" name="date_debut" required><br><br>

    <input type="submit" name="envoyer" value="Ajouter">

</form>

<a href="index.php">Retour</a>

</body>
</html>
