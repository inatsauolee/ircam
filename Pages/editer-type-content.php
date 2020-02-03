<?php
//require_once('identifier.php');
require_once("connexiondb.php");
if (isset($_GET['idTy'])) {
    $idTy = $_GET['idTy'];
} else {
    header("location:types.php");
}

$requete = "select * from type where ID=$idTy";
$resultat = $pdo->query($requete);
$type = $resultat->fetch();
$nomTy = $type['label'];
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
                <div class="panel-heading">Edition de La type :</div>



                <div class="panel-body">
                    <form method="post" action="update-type.php" class="form">



                        <div class="from-group">
                            <label class="from-control">id de la type : <?php echo $idTy ?></label>
                            <input type="hidden" name="idTy" class="from-control" value="<?php echo $idTy ?>" />
                        </div>



                        <div class="from-group">
                            <label class="from-control">Nom de la type :</label>
                            <input type="text" name="nomTy" placeholder="Nom de la type" class="from-control" value="<?php echo $nomTy ?>" />
                        </div>



                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>