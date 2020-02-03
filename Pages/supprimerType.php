<?php 
    session_start();
    if(isset($_SESSION['user'])){

        require_once('connexiondb.php');
        $idTy=isset($_GET['idTy'])?$_GET['idTy']:0;

        $requete="delete from type where ID=?";
        $params=array($idTy);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);

        header('location:types.php');
    }else{
        header('location:login.php');
    }
?>