<?php
try{
    $pdo = new PDO('sqlite:'.dirname(__FILE__).'/exercice02.sqlite');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
} catch(Exception $e) {
    echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
    die();
}


$stmt = $pdo->prepare("SELECT * FROM countries WHERE titre = :titre");
$stmt->execute(array('titre' => 'Lorem ipsum'));
$result = $stmt->fetchAll();
print_r($result);
?>