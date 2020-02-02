<?php 
    session_start();
    // if(isset($_SESSION['user'])){

            require_once("connexiondb.php");
        
                $label=isset($_POST['label'])?$_POST['label']:"";
                $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
                $civilite=isset($_POST['civilite'])?$_POST['civilite']:"";  
                $cin=isset($_POST['cin'])?$_POST['cin']:"";
        
  //      var_dump($affectation);
    //    die();
        
//   $cv=isset($_POST['cv'])?$_POST['cv']:"";
  
    $cv=isset($_FILES['cv']['name'])?$_FILES['cv']['name']:"";
    $imageTemp=isset($_FILES['cv']["tmp_name"])?$_FILES['cv']["tmp_name"]:"";
    move_uploaded_file($imageTemp,"../cv-source/"."$cv");
        
        
    
   


            $requete="INSERT INTO stagiaire (nom,prenom,civilite,cin,adresse,telephone,idEtablissement,idVille,idFiliere,idAffectation,nbrautorisation,idParrain,datedu,dateau,cv) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
$params=array($nom,$prenom,$civilite,$cin,$adresse,$telephone,$etablissement,$ville,$filiere,$affectation,$nbrautorisation,$parrain,$datedu,$dateau,$cv);

     //   var_dump($params);
    //  die();
        
            $resultat=$pdo->prepare($requete);
            $resultat->execute($params);

			
            header('location:stagiaires.php');
    // }else{
    //     header('location:login.php');
    // }
?>