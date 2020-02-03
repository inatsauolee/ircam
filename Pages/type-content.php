<?php 
    // require_once('identifier.php');    //pour s'edentifer
    require_once("connexiondb.php");


    $size=isset($_GET['size'])?$_GET['size']:5; // La nombre des types qui affichant sur chaque page
    $page=isset($_GET['page'])?$_GET['page']:1;  // la page choisir 
    $offset=($page-1)*$size; 

    $nomTy=isset($_GET['nomTy'])?$_GET['nomTy']:"";
    $requete="select * from type where label like '%$nomTy%' limit $size offset $offset;";


    $requeteCount=$pdo->query("select count(*) from type where label like '%$nomTy%'")->fetchAll(PDO::FETCH_NUM); 

    $resultatEt=$pdo->query($requete)->fetchAll(PDO::FETCH_ASSOC);
   
    $resultatCount=count($resultatEt);
    $tabCount=$requeteCount[0][0];
    $nbrType=$requeteCount[0][0];

    $reste=$tabCount % $size;             /* % L'operateur modulo: le rest de la divistion
                                                    euclidienne de $nbrType par $size*/

    if($reste===0)                      //$nbrTypes est un multiple de $size 
        $nbrPage=$tabCount/$size;
    else
        $nbrPage=floor($tabCount/$size)+1;    // floor : la partie entière d'un nombre décimal
     
?>
<html>
		<head><link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

    <body>
    <div class="container">
            <div class="panel panel-success margetop">
                <div class="panel-heading">Rechercher des types...</div>
                <div class="panel-body">
                    <form method="get" action="types.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="nomTy" placeholder="Taper le nom de type" class="form-control" value="<?php echo $nomTy;?>" >
                        </div>
                             
                                        
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"> </span>
                            chercher...
                        </button>
                        &nbsp &nbsp
                        <a href="add-type.php"><sapn class="glyphicon glyphicon-plus" ></sapn> Nouvelle type</a>
                    </form>
                            
                
                </div>
            </div>
             <div class="panel panel-primary">
                <div class="panel-heading"> Liste des types 
                  (<?php echo $nbrType ?> Types)
                
                 </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th> <th>Nom Type</th> <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody> 
                            
                            <?php foreach ($resultatEt as $type){?>
                                <tr>
                                    <td> <?php echo $type['ID'] ?> </td>
                                    <td> <?php echo $type['label'] ?> </td>
                                    <td>
                                        <a href="editer-type.php?idTy=<?php echo $type['ID'] ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                            &nbsp &nbsp
                                        <a onclick="return confirm('Etes-vous sur de vouloir supprimer cette type?')"  href="supprimerType.php?idTy=<?php echo $type['ID'] ?>">
                                            <span class="glyphicon glyphicon-trash "></span>
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
                            
                                <a href="types.php?page=<?php echo $i;?>&nomTy=<?php echo $nomTy;?>"> <?php echo $i; ?>  
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