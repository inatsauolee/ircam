<?php 
    //session_start();
    if(isset($_SESSION['user'])){   
        require_once('connexiondb.php');
          if (isset($_POST['idEt'])){
                $idEt=$_POST['idEt'];
             }
            else{
                header("location:categorys.php");
            }

        $nomEt=isset($_POST['nomEt'])?$_POST['nomEt']:"";

        $requete="update category set label=? where ID=?";
        $params=array($nomEt,$idCat);
        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);

        header('location:categorys.php');
    }else{
        header('location:login.php');
    }
?>