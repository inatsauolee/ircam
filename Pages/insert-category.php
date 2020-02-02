<?php

require_once('identifier.php');
require_once("connexiondb.php");

$nomCat = isset($_POST['nomCat']) ? $_POST['nomCat'] : "";
$user = $_SESSION['user'];
$id = $user['ID'];

$requete = "INSERT INTO category (`ID`, `label`, `creator`) VALUES ('', '$nomCat', '$id')";

if (strlen($nomCat) >= 3) {
    try {
        $resultatEt = $pdo->query($requete);
        header('location:categorys.php');
    } catch (Exception $e) {
        die('Erreur de connexion :' . $e->getMessage());
    }
} else {
    echo 'Donnee invalide !';
}
