<?php
// require_once('identifier.php');    //pour s'edentifer
require_once("connexiondb.php");
$bool = 0;

$size = isset($_GET['size']) ? $_GET['size'] : 5; // La nombre des words qui affichant sur chaque page
$page = isset($_GET['page']) ? $_GET['page'] : 1;  // la page choisir 
$offset = ($page - 1) * $size;

$nomWo = isset($_GET['nomWo']) ? $_GET['nomWo'] : "";
$requete = "SELECT t.ID AS ID, w.label AS eLabel, t.tifinagh AS label, p.label AS type, c.label AS category, u.username AS creator
 FROM word w, tawalt t, type p, category c, user u
 WHERE w.tawalt_ID = t.ID
 AND c.ID = t.category
 AND p.ID = t.type
 AND u.ID = t.creator
 AND (w.label LIKE '%$nomWo%' 
 OR t.label LIKE '%$nomWo%')
 LIMIT $size offset $offset;";
$requeteCount = $pdo->query("SELECT count(*) FROM word w, tawalt t WHERE w.tawalt_ID = t.ID AND (w.label LIKE '%$nomWo%' OR t.label LIKE '%$nomWo%')")->fetchAll(PDO::FETCH_NUM);
$resultatEt = $pdo->query($requete)->fetchAll(PDO::FETCH_ASSOC);
$resultatCount = count($resultatEt);
$tabCount = $requeteCount[0][0];
$nbrWord = $requeteCount[0][0];

$reste = $tabCount % $size;             /* % L'operateur modulo: le rest de la divistion
                                                    euclidienne de $nbrword par $size*/

if ($reste === 0)                      //$nbrwords est un multiple de $size 
    $nbrPage = $tabCount / $size;
else
    $nbrPage = floor($tabCount / $size) + 1;    // floor : la partie entière d'un nombre décimal

?>
<html>

<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher des words...</div>
            <div class="panel-body">
                <form method="get" action="words.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="nomWo" placeholder="Taper le Mot" class="form-control" value="<?php echo $nomWo; ?>">
                    </div>


                    <button type="submit" class="btn btn-success">
                        <span class="fa fa-search"> </span>
                        chercher...
                    </button>
                    &nbsp &nbsp
                    <a href="add-word.php">
                        <sapn class="fa fa-plus"></sapn> Nouvelle Wor
                    </a>
                </form>


            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading"> Liste des words
                (<?php echo $nbrWord ?> Words)

            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Tamazight</th>
                            <th>English</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Creator</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($resultatEt as $word) { ?>
                            <tr>
                                <td> <?php 
                                    if($bool == 1) {
                                        echo "<input value=\"kkk\"/>";
                                    } else {
                                        echo $word['ID'];
                                    }
                                ?> </td>
                                <td> <?php echo $word['label'] ?> </td>
                                <td> <?php echo $word['eLabel'] ?> </td>
                                <td> <?php echo $word['type'] ?> </td>
                                <td> <?php echo $word['category'] ?> </td>
                                <td> <?php echo $word['creator'] ?> </td>
                                <td>
                                    <a (click)="<?php $bool = 0; ?>">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    &nbsp &nbsp
                                    <a onclick="return confirm('Etes-vous sur de vouloir supprimer cette word?')" href="supprimerWord.php?idWord=<?php echo $word['ID'] ?>">
                                        <span class="fa fa-trash "></span>
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