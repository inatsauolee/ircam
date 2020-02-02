<?php
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=ircam","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die('Erreur de connexion :' .$e->getMessage());
    }
?>