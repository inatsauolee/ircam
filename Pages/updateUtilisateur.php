<?php 
    session_start();
    if(isset($_SESSION['user'])){
        require_once('connexiondb.php');
        $ID=isset($_POST['ID'])?$_POST['ID']:"";
        $username=isset($_POST['username'])?$_POST['username']:"";
        $firstname=isset($_POST['firstname'])?$_POST['firstname']:"";
        $lastname=isset($_POST['lastname'])?$_POST['lastname']:"";
        $email=isset($_POST['email'])?$_POST['email']:"";
        $passwrod=isset($_POST['passwrod'])?$_POST['passwrod']:"";
        $role=isset($_POST['role'])?$_POST['role']:"F";


        $requete="update user set username=?,firstname=?,lastname=?,email=?,passwrod=?,role=? where ID=?";
        $params=array($username,$firstname,$lastname,$email,$passwrod,$role,$ID);

        $resultat=$pdo->prepare($requete);
        $resultat->execute($params);

        header('location:utilisateurs.php');
    }else{
        header('location:index.php');
    }


?>