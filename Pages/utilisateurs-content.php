<?php

require_once('identifier.php');
require_once("connexiondb.php");
$username = isset($_GET['username']) ? $_GET['username'] : "";
$size = isset($_GET['size']) ? $_GET['size'] : 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;

$requeteUser = "select * from user where username like '%$username%'";
$requeteCount = "select count(*) countUser from user";

$resultatUser = $pdo->query($requeteUser);
$resultatCount = $pdo->query($requeteCount);

$tabCount = $resultatCount->fetch()["countUser"];
$nbrUser = $tabCount;
$reste = $nbrUser % $size;
if ($reste === 0)
    $nbrPage = $nbrUser / $size;
else
    $nbrPage = floor($nbrUser / $size) + 1;
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
                <div class="panel-heading">Rechercher des utilisateurs...</div>
                <div class="panel-body">
                    <form method="get" action="utilisateurs.php">
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Login..." class="form-control" value="<?php echo $username; ?>">
                        </div>

                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"> </span>
                            chercher...
                        </button>
                        &nbsp &nbsp

                    </form>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading"> Liste des utilisateurs
                    (<?php echo $nbrUser ?> utilisateurs)

                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered" class="form-inline">
                        <thead>
                            <tr>
                                <td  align=center>Username</td>
                                <td  align=center>E-mail</td>
                                <td  align=center>First name</td>
                                <td  align=center>Last name</td> 
                                <td align=center>Role</td>
                                <td align=center>Actions</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($resultatUser as $user) { ?>


                                <tr class="<?php echo $user['etat'] == 1 ? 'success' : 'danger' ?>">
                                    <td> <?php echo $user['username'] ?> </td>
                                    <td> <?php echo $user['email'] ?> </td>
                                    <td> <?php echo $user['first_name'] ?> </td>
                                    <td> <?php echo $user['last_name'] ?> </td>
                                    <td> <?php echo $user['role'] ?> </td>
                                    <td>
                                        <a href="editerUtilisateur.php?ID=<?php echo $user['ID'] ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        &nbsp &nbsp
                                        <a onclick="return confirm('Etes-vous sur de vouloir supprimer le utilisateur?')" href="supprimerUtilisateur.php?ID=<?php echo $user['ID'] ?>">
                                            <span class="glyphicon glyphicon-trash "></span>
                                        </a>
                                        &nbsp &nbsp
                                        <a href="activerUtilisateur.php?ID=<?php echo $user['ID'] ?>&etat=<?php echo $user['etat'] ?>">
                                            <?php
                                            if ($user['etat'] == 1)
                                                echo '<span class="glyphicon glyphicon-remove"></span>';
                                            else
                                                echo '<span class="glyphicon glyphicon-ok"></span>';
                                            ?>
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

                                    <a href="utilisateurs.php?page=<?php echo $i; ?>&username=<?php echo $username; ?>"> <?php echo $i; ?>
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