<?php
// require_once('identifier.php');    //pour s'edentifer
require_once("connexiondb.php");


$size = isset($_GET['size']) ? $_GET['size'] : 5; // La nombre des categorys qui affichant sur chaque page
$page = isset($_GET['page']) ? $_GET['page'] : 1;  // la page choisir 
$offset = ($page - 1) * $size;

$nomWo = isset($_GET['nomWo']) ? $_GET['nomWo'] : "";
$requete = "select * from category where label like '%$nomWo%' limit $size offset $offset;";
$requeteCount = $pdo->query("select count(*) from category where label like '%$nomWo%'")->fetchAll(PDO::FETCH_NUM);
$resultatEt = $pdo->query($requete)->fetchAll(PDO::FETCH_ASSOC);
$resultatCount = count($resultatEt);
$tabCount = $requeteCount[0][0];
$nbrCategory = $requeteCount[0][0];

$reste = $tabCount % $size;             /* % L'operateur modulo: le rest de la divistion
                                                    euclidienne de $nbrCategory par $size*/

if ($reste === 0)                      //$nbrCategorys est un multiple de $size 
    $nbrPage = $tabCount / $size;
else
    $nbrPage = floor($tabCount / $size) + 1;    // floor : la partie entière d'un nombre décimal

?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher des categorys...</div>
            <div class="panel-body">
                <form method="get" action="categorys.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="nomWo" placeholder="Taper le Mot" class="form-control" value="<?php echo $nomWo; ?>">
                    </div>


                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"> </span>
                        chercher...
                    </button>
                    &nbsp &nbsp
                    <a href="add-tawalt-word.php">
                        <sapn class="glyphicon glyphicon-plus"></sapn> Nouvelle Wor
                    </a>
                </form>


            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading"> Liste des categorys
                (<?php echo $nbrCategory ?> Categorys)

            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($resultatEt as $category) { ?>
                            <tr>
                                <td> <?php echo $category['ID'] ?> </td>
                                <td> <?php echo $category['label'] ?> </td>
                                <td>
                                    <a href="editer-word.php?idCat=<?php echo $category['ID'] ?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    &nbsp &nbsp
                                    <a onclick="return confirm('Etes-vous sur de vouloir supprimer cette category?')" href="supprimerWord.php?idCat=<?php echo $category['ID'] ?>">
                                        <span class="glyphicon glyphicon-trash "></span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $nbrPage; $i++) {  ?>
                            <li class="<?php if ($i == $page) echo 'active' ?>">

                                <a href="words.php?page=<?php echo $i; ?>&nomWo=<?php echo $nomWo; ?>"> <?php echo $i; ?>
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