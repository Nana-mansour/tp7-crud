
<?php
require_once("../database/connexion.php");

if (isset($_GET["id_etudiant"])) {
    $id = $_GET["id_etudiant"];
} else {
    echo "cet Etudiant n'existe pas";
    exit();
}

$E = $pdo->prepare("DELETE FROM Etudiant WHERE id_etudiant = ?");
$E->execute([$id]);

header("Location: index.php");
exit;
?>
