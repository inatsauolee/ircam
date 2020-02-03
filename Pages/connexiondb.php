<?php
    try{
        //$pdo=new PDO("mysql:host=localhost;dbname=ircam","root","");
        $pdo=new PDO("mysql:host=sql202.epizy.com;dbname=epiz_23846669_ircam","epiz_23846669","UF2erKHutrJI2OZ");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die('Erreur de connexion :' .$e->getMessage());
    }
?>
