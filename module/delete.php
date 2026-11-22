
<?php
require_once("../database/connexion.php");

$id = $_GET["id"];

$M = $pdo->prepare("DELETE FROM Module WHERE num_module = ?");
$M->execute([$id]);

header("Location: index.php");
exit;
?>
