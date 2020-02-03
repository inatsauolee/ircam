<?php 
    //session_start();
    if(isset($_SESSION['user'])){   
        require_once('connexiondb.php');
          if (isset($_POST['idTy'])){
                $idTy=$_POST['idTy'];
             }
            else{
                header("location:types.php");
            }

        $nomTy=isset($_POST['nomTy'])?$_POST['nomTy']:"";

        $requete="update type set label=? where ID=?";
        $params=array($nomTy,$idTy);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);

        header('location:types.php');
    }else{
        header('location:login.php');
    }
?>