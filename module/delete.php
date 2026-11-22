
<?php
require_once("../database/connexion.php");

if (isset($_GET["num_module"])) {
    $id = $_GET["num_module"];
} else {
    echo "ce module n'existe pas";
    exit();
}

$M = $pdo->prepare("DELETE FROM Module WHERE num_module = ?");
$M->execute([$id]);

header("Location: index.php");
exit;
?>
