
<?php
require_once("../database/connexion.php");

if (isset($_GET["id_etudiant"])) {
    $id = $_GET["id_etudiant"];
} else {
    echo "cet Etudiant n'existe pas";
    exit();
}


$E = $pdo->prepare("SELECT * FROM Etudiant WHERE id_etudiant = ?");
$E->execute([$id]);
$Etudiant = $E->fetch(PDO::FETCH_ASSOC);

$F = $pdo->prepare("SELECT * FROM Formation");
$F->execute();
$Formations = $F->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["modifier"])) {

    $requete = "UPDATE Etudiant
                SET nom = ?, prenom = ?, num_formation = ?
                WHERE id_etudiant = ?";

    $E = $pdo->prepare($requete);

    $E->execute([
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["num_formation"],
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifier étudiant</title>
        <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<h1>Modifier un étudiant</h1>

<form method="POST">

    Nom :
    <input type="text" name="nom"
    value="<?= htmlspecialchars($Etudiant['nom']) ?>"><br><br>

    Prénom :
    <input type="text" name="prenom"
    value="<?= htmlspecialchars($Etudiant['prenom']) ?>"><br><br>

    Formation :
    <select name="num_formation">
        <?php foreach($Formations as $Formation){ ?>
            <option value="<?= $Formation['num_formation'] ?>"
            <?= $Formation['num_formation'] == $Etudiant['num_formation'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($Formation['nom_formation']) ?>
            </option>
        <?php } ?>
    </select><br><br>

    <input type="submit" name="modifier" value="Modifier">

</form>

</body>
</html>
