<?php
try {
    $bdd = new PDO('mysql:host=cfaifrnfzyg5.mysql.db;dbname=cfaifrnfzyg5;charset=utf8', 'cfaifrnfzyg5', 'Aiut2020');
    //$bdd =  new PDO("mysql:dbname=cfaifrnfzyg5;host=localhost;charset=utf8", 'root', '');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}

$req = $bdd->prepare('DELETE FROM billets where id=?');
$req->execute(array($_GET['id']));
header('location: ../admin/gestionDesActualites.php');