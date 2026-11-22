<?php 

$host="localhost";
$dbname="tp7-crud";
$username="root";
$passeword="";


try {
$pdo=new PDO(
    
"mysql:host=$host;
dbname=$dbname;
charset=utf8mb4",
$username,
$passeword
);

$pdo->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
}
catch(PDOException $exception){
    echo"ERREUR DE CONNECTION:".$exception->getMessage();
}



?>