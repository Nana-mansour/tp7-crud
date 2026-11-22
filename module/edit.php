
<?php
require_once("../database/connexion.php");

if (isset($_GET["num_module"])) {
    $id = $_GET["num_module"];
} else {
    echo "Numéro du module manquant";
    exit();
}

$M = $pdo->prepare("SELECT * FROM Module WHERE num_module = ?");
$M->execute([$id]);
$module = $M->fetch(PDO::FETCH_ASSOC);

$F = $pdo->prepare("SELECT * FROM Formation");
$F->execute();
$Formations = $F->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["modifier"])) {

    $requete = "UPDATE Module
                SET nom = ?, `filière` = ?, num_formation = ?
                WHERE num_module = ?";

    $M = $pdo->prepare($requete);

    $M->execute([
        $_POST["nom"],
        $_POST["filiere"],
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
    <title>Modifier module</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Modifier un module</h1>

<form method="POST">

    Nom :
    <input type="text" name="nom"
    value="<?= htmlspecialchars($module['nom']) ?>"><br><br>

    Filière :
    <input type="text" name="filiere"
    value="<?= htmlspecialchars($module['filière']) ?>"><br><br>

    Formation :
    <select name="num_formation">
        <?php foreach($Formations as $Formation){ ?>
            <option value="<?= $Formation['num_formation'] ?>"
            <?= $Formation['num_formation'] == $module['num_formation'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($Formation['nom_formation']) ?>
            </option>
        <?php } ?>
    </select><br><br>

    <input type="submit" name="modifier" value="Modifier">

</form>

</body>
</html>
