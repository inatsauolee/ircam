<?php

require_once('identifier.php');
require_once("connexiondb.php");

$eLabel = isset($_POST['eLabel']) ? $_POST['eLabel'] : "";
$tifinagh = isset($_POST['tifinagh']) ? $_POST['tifinagh'] : "";
$category = isset($_POST['category']) ? $_POST['category'] : 1;
$type = isset($_POST['type']) ? $_POST['type'] : 0;
$user = $_SESSION['user'];
$id = $user['ID'];

// il faut changer le nom de la table dans la base de donnees de type vers types! merci...
$requete = "INSERT INTO tawalt (`ID`, `tifinagh`, `label`, `type`, `category`, `creator`) 
VALUES ('', '$tifinagh', '$tifinagh', '$type','$category', '$id')";

try {
    $resultatEt = $pdo->query($requete);
    if ($resultatEt) {
        $last_id = $pdo->lastInsertId();
        $pdo->query("INSERT INTO word (`ID`, `tawalt_ID`, `label`) VALUES ('','$last_id', '$eLabel')");
        header('location:words.php');
    }
} catch (Exception $e) {
    die('Erreur de connexion :' . $e->getMessage());
}
