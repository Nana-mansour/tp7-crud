
<?php
require_once("../database/connexion.php");

if (isset($_GET["num_formation"])) {
    $id = $_GET["num_formation"];
} else {
    echo "cette formation n'existe pas";
    exit();
}

$F = $pdo->prepare("SELECT * FROM Formation WHERE num_formation = ?");
$F->execute([$id]);
$Formation = $F->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["modifier"])) {

    $requete = "UPDATE Formation
                SET nom_formation = ?, date_debut = ?
                WHERE num_formation = ?";

    $F = $pdo->prepare($requete);

    $F->execute([
        $_POST["nom_formation"],
        $_POST["date_debut"],
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
    <title>Modifier formation</title>
        <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<h1>Modifier une formation</h1>

<form method="POST">

    Nom :
    <input type="text" name="nom_formation"
    value="<?= htmlspecialchars($Formation['nom_formation']) ?>"><br><br>

    Date de début :
    <input type="date" name="date_debut"
    value="<?= htmlspecialchars($Formation['date_debut']) ?>"><br><br>

    <input type="submit" name="modifier" value="Modifier">

</form>

</body>
</html>
