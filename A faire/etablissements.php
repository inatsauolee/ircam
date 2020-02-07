<?php
	header('Content-type: text/html; charset=utf-8');
?>
<?php 
    require_once('identifier.php');
    require_once("connexiondb.php");


    $size=isset($_GET['size'])?$_GET['size']:5; // La nombre des etablissements qui affichant sur chaque page
    $page=isset($_GET['page'])?$_GET['page']:1;  // la page choisir 
    $offset=($page-1)*$size; 

    $nomEt=isset($_GET['nomEt'])?$_GET['nomEt']:"";
    $requete="select * from etablissement where nomEtablissement like '%$nomEt%' limit $size offset $offset";


    $requeteCount=$pdo->query("select count(*) from etablissement where nomEtablissement like '%$nomEt%'")->fetchAll(PDO::FETCH_NUM); 

    $resultatEt=$pdo->query($requete)->fetchAll(PDO::FETCH_ASSOC);
   
    $resultatCount=count($resultatEt);
    $tabCount=$requeteCount[0][0];
    $nbrEtablissement=$requeteCount[0][0];

    $reste=$tabCount % $size;             /* % L'operateur modulo: le rest de la divistion
                                                    euclidienne de $nbrEtablissement par $size*/

    if($reste===0)                      //$nbrEtablissement est un multiple de $size 
        $nbrPage=$tabCount/$size;
    else
        $nbrPage=floor($tabCount/$size)+1;    // floor : la partie entière d'un nombre décimal
     
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
                <div class="panel-heading">Rechercher des etablissements...</div>
                <div class="panel-body">
                    <form method="get" action="etablissements.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="nomEt" placeholder="Taper le nom d'etablissement" class="form-control" value="<?php echo $nomEt;?>" >
                        </div>
                             
                                        
                        <button type="submit" class="btn btn-success">
                            <span class="fa fa-search"> </span>
                            chercher...
                        </button>
                        &nbsp &nbsp
                        <a href="nouvelleEtablissement.php"><sapn class="fa fa-plus" ></sapn> Nouvelle etablissement</a>
                    </form>
                            
                
                </div>
            </div>
             <div class="panel panel-primary">
                <div class="panel-heading"> Liste des etablissements 
                  (<?php echo $nbrEtablissement ?> Etablissements)
                
                 </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th> <th>Nom Etabliessment</th> <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody> 
                            
                            <?php foreach ($resultatEt as $etablissement){?>
                                <tr>
                                    <td> <?php echo $etablissement['idEtablissement'] ?> </td>
                                    <td> <?php echo $etablissement['nomEtablissement'] ?> </td>
                                    <td>
                                        <a href="editerEtablissement.php?idEt=<?php echo $etablissement['idEtablissement'] ?>">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                            &nbsp &nbsp
                                        <a onclick="return confirm('Etes-vous sur de vouloir supprimer cette etablissement?')"  href="supprimerEtablissement.php?idEt=<?php echo $etablissement['idEtablissement'] ?>">
                                            <span class="fa fa-trash "></span>
                                        </a>
                                    </td>
                                </tr>    
                            <?php } ?>
                        </tbody>
                    </table>
                    <div>
                        <ul class="pagination">
                            <?php for($i=1;$i<=$nbrPage;$i++) {  ?>
                            <li class="<?php if($i==$page) echo 'active' ?>">
                            
                                <a href="etablissements.php?page=<?php echo $i;?>&nomEt=<?php echo $nomEt;?>"> <?php echo $i; ?>  
                                </a> 
                                
                            
                            </li>

                           <?php } ?>
                       </ul>
                    </div>
                    </div>
            </div>
        </div>
    </body>

</html>