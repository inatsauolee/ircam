<?php 
    session_start();
    if(isset($_SESSION['user'])){

        require_once('connexiondb.php');
        $idWord=isset($_GET['idWord'])?$_GET['idWord']:0;

        $requete="delete from tawalt where ID=?";
        $params=array($idWord);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);

        header('location:words.php');
    }else{
        header('location:login.php');
    }
?>