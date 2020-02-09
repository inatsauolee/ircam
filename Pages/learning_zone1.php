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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard </title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">InuSselmad</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Study <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Dictionary</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fa fa-search"></span> <!-- Probleme d'affichage des icons! -->
                Languages
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">English</a>
                <a class="dropdown-item" href="#">Tamaziɣt</a>
                <a class="dropdown-item" href="#">ⵜⴰⵎⴰⵣⵉⵖⵜ</a>
              </div>
       
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">
                <a href="login.php"><span class="fa fa-log-out">&nbsp;Deconnexion </span></a>
            </button>
          </form>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <div class="row-md-2">
            <h1>Learning Zone</h1> 
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-10">
            <div class="col-md-auto">
                <!-- Progression bar -->
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100" style="width:12.2%">
                         12,2% Complete 
                    </div>
                </div>
                <div><br/>
                    <h3> Traduire le mots suivante </h3>
                    <h5>* House</h5>
                    <!-- check box -->
                    <div class="checkbox">
                      <label><input type="checkbox" value="">&nbsp;&nbsp;Option 1</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">&nbsp;&nbsp;Option 2</label>
                    </div>
                    <div class="checkbox disabled">
                      <label><input type="checkbox" value="">&nbsp;&nbsp;Option 3</label>
                    </div>
                </div>
                <a href="" class="btn btn-success btn-lg btn-block" role="button">
                        <span class="fa fa-log-out"></span>&nbsp;&nbsp;&nbsp;&nbsp; Check
                    </a>
                
            </div>
          </div>
        </div>
    </div>
      
</body>
<footer>

</footer>
</html>