<?php
// header('Content-type: text/html; charset=utf-8');
    // require_once('identifier.php');
    require_once("connexiondb.php"); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ajouter un expression  </title>
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
                <span class="glyphicon glyphicon-search"></span> <!-- Probleme d'affichage des icons! -->
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
                <a href="login.php"><span class="glyphicon glyphicon-log-out">&nbsp;Deconnexion </span></a>
            </button>
          </form>
        </div>
    </nav>

    <!-- ---------------------------------------------------------------------------------------------------------- -->
    <div class="jumbotron text-center">
        <div class="row-md-2">
            <h1>Ajouter des mots</h1> 
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="col-md-auto">
                    <!-- Le mot en Anglais -->
                    <div class="form-group">
                        <label for="cin" >Le mot en anglais :</label>
                        <input type="text" name="cin" placeholder="Veuillez de saisir Le mot en anglais" class="form-control" />
                    </div>   
                    <!-- Le mot en Tifinagh -->
                    <div class="form-group">
                        <label for="cin" >Le mot en Tifinagh :</label>
                        <input type="text" name="cin" placeholder="Veuillez de saisir Le mot en Tifinagh" class="form-control"  />
                    </div>
                    <div class="form-group">
                            <label for="category" >Category:</label>
                                <select name="category" id="category" class="form-control" style="text-transform: capitalize;">
                                  <?php

                                    $resSe=$pdo->query("SELECT id,label from category")->fetchAll(PDO::FETCH_NUM);
                                    foreach ($resSe as $row){
                                        echo "<option value=\"$row[0]\">$row[1]</option>";
                                    }

                                    ?>
                                </select>
                    </div>
                  
                    <div class="form-group">
                      <label for="type" >Type:</label>
                          <select name="type" id="type" class="form-control" style="text-transform: capitalize;">
                            <?php

                              $resSe=$pdo->query("SELECT id,label from type")->fetchAll(PDO::FETCH_NUM);
                              foreach ($resSe as $row){
                                  echo "<option value=\"$row[0]\">$row[1]</option>";
                              }

                              ?>
                          </select>
              </div>
                    <div>
                    <a href="" class="btn btn-success btn-lg btn-block" role="button">
                        <span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;&nbsp;&nbsp; + Ajouter
                    </a>  
                    </div> 
          </div>
        </div>
    </div>
      
</body>
<footer>

</footer>
</html>