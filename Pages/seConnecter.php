<?php
session_start();
require_once("connexiondb.php");
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

$requete = "select * from user where username='$username' and password='$password'";
$resultat = $pdo->query($requete);

if ($user = $resultat->fetch()) {
    if ($user['role'] == 0) {
        $_SESSION['user'] = $user;
        header('location:avancer.php');
    } else if($user['role'] == 1) {
        $_SESSION['user'] = $user;
        header('location:../index.php');
    } else {
        $_SESSION['erreurLogin'] = "</strong>Erreur!! Votre compte est désactivé.<br>Veuillez contacter l'administrateur";
        header('location:login.php');
    }
} else {
    $_SESSION['erreurLogin'] = "</strong>Login ou mot de passe incorrecte!! ";
    header('location:login.php');
}
