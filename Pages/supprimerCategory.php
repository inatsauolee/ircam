<?php 
    session_start();
    if(isset($_SESSION['user'])){

        require_once('connexiondb.php');
        $idEt=isset($_GET['idCat'])?$_GET['idCat']:0;

        $requete="delete from category where ID=?";
        $params=array($idCat);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);

        header('location:categorys.php');
    }else{
        header('location:login.php');
    }
?>