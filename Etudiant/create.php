
<?php
require_once("../database/connexion.php");

$F = $pdo->prepare("SELECT * FROM Formation");
$F->execute();
$Formations = $F->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["envoyer"])) {

    $requete = "INSERT INTO Etudiant
                (nom, prenom, num_formation)
                VALUES (?, ?, ?)";

    $E = $pdo->prepare($requete);

    $E->execute([
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["num_formation"]
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter étudiant</title>
        <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<h1>Ajouter un étudiant</h1>

<form method="POST">

    Nom :
    <input type="text" name="nom" required><br><br>

    Prénom :
    <input type="text" name="prenom" required><br><br>

    Formation :
    <select name="num_formation" required>
        <?php foreach($Formations as $Formation){ ?>
            <option value="<?= $Formation['num_formation'] ?>">
                <?= $Formation['nom_formation'] ?>
            </option>
        <?php } ?>
    </select><br><br>

    <input type="submit" name="envoyer" value="Ajouter">

</form>

<a href="index.php">Retour</a>

</body>
</html>
