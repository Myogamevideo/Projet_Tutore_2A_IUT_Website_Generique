<?php
try {
    $bdd = new PDO('mysql:host=cfaifrnfzyg5.mysql.db;dbname=cfaifrnfzyg5;charset=utf8', 'cfaifrnfzyg5', 'Aiut2020');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}

$req = $bdd->prepare('delete from commentaires where id=?');
$req->execute(array($_GET['id']));
header('location: commentaires.php?id_billet=' . $_GET['id_billet'] . '');