
<?php
require_once("../database/connexion.php");

if (isset($_GET["num_formation"])) {
    $id = $_GET["num_formation"];
} else {
    echo "cette formation n'existe pas
    ";
    exit();
}

try {

    $F = $pdo->prepare("DELETE FROM Formation WHERE num_formation = ?");
    $F->execute([$id]);

    header("Location: index.php");
    exit;

} catch(PDOException $exception) {

    echo "Impossible de supprimer cette formation.";
    echo "Elle est peut-être utilisée par des étudiants ou des modules.";

}
?>
