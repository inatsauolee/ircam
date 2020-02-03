<?php

require_once('identifier.php');
require_once("connexiondb.php");

$nomTy = isset($_POST['nomTy']) ? $_POST['nomTy'] : "";
$user = $_SESSION['user'];
$id = $user['ID'];




// il faut changer le nom de la table dans la base de donnees de type vers types! merci...
$requete = "INSERT INTO types (`ID`, `label`, `creator`) VALUES ('', '$nomTy', '$id')";






if (strlen($nomTy) >= 3) {
    try {
        $resultatEt = $pdo->query($requete);
        header('location:types.php');
    } catch (Exception $e) {
        die('Erreur de connexion :' . $e->getMessage());
    }
} else {
    echo 'Donnee invalide !';
}
