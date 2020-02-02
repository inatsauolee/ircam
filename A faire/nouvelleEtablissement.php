<?php 
	header('Content-type: text/html; charset=utf-8');
    require_once('identifier.php');
    require_once("connexiondb.php");

    $nomEt=isset($_POST['nomEt'])?$_POST['nomEt']:"";
 
    $requete="INSERT INTO etablissement (nomEtablissement) VALUES (\"".$nomEt."\");";
echo "INSERT INTO Etablissement (nomEtablissement) VALUES (\"".$nomEt."\");";
if (strlen($nomEt)>=3){
    $resultatEt=$pdo->query($requete);
}else{
    echo 'Donnee invalide !';
}


 
?>
<! DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
		<title>GestaGiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <div class="container">
            <div class="panel panel-success margetop">
                <div class="panel-heading">Nouvelle Etablissement...</div>
                <div class="panel-body">
                    <form method="post" action=<?php '"'.$_SERVER['PHP_SELF'].'"'; ?>>
                        <div class="form-group">
                            <input type="text" name="nomEt" placeholder="Taper le nom d'etablissement" class="form-control">
                        </div>
                             
                                        
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus"> </span>
                            Ajouter
                        </button>
                        &nbsp &nbsp
                    </form>
                            
                
                </div>
            </div>
        </div>
    </body>

</html>