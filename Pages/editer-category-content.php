<?php
//require_once('identifier.php');
require_once("connexiondb.php");
if (isset($_GET['idCat'])) {
    $idCat = $_GET['idCat'];
} else {
    header("location:categorys.php");
}

$requete = "select * from category where ID=$idCat";
$resultat = $pdo->query($requete);
$category = $resultat->fetch();
$nomCat = $category['label'];
?>










<! DOCTYPE HTML>
    <html>


    <head>
        <meta charset="utf-8">
        <title>InuSselmad</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>







    <body>

        <div class="container">
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition de La category :</div>



                <div class="panel-body">
                    <form method="post" action="updateEtablissement.php" class="form">



                        <div class="from-group">
                            <label class="from-control">id de la category : <?php echo $idCat ?></label>
                            <input type="hidden" name="idCat" class="from-control" value="<?php echo $idCat ?>" />
                        </div>



                        <div class="from-group">
                            <label class="from-control">Nom de la category :</label>
                            <input type="text" name="nomCat" placeholder="Nom de la category" class="from-control" value="<?php echo $nomCat ?>" />
                        </div>



                        <button type="submit" class="btn btn-success">
                            <span class="fa fa-save"></span>
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>