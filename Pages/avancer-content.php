<?php
//require_once('identifier.php');
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
        <?php include("menu.php"); ?>
        <div class="container">

            <div class="panel panel-primary margetop">
                <div class="panel-heading">Bibliotheques</div>
                <div class="panel-body">
                    <div class="panel-body">
                        <table class="table table-striped table-bordered" class="form-inline">
                            <thead>
                                <tr align="center">
                                    <td>
                                        <a href="categorys.php">
                                            <!-- <img src="../images/bibliotheque-parrains.jpg" width="400px" height="200px"> -->
                                            <button type="submit" class="btn btn-success">
                                                <!-- <span class="fa fa-search"> </span> -->
                                                Bibliotheque des categorys
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="utilisateurs.php">
                                            <!-- <img src="../images/bibliotheque-fillier.jpg" width="400px" height="200px"> -->
                                            <button type="submit" class="btn btn-success">
                                                <!-- <span class="fa fa-search"> </span> -->
                                                bibliotheque des utilisateurs
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td>
                                        <a href="types.php">
                                            <!-- <img src="../images/bibliotheque-utilisateurs.jpg" width="400px" height="200px"> -->
                                            <button type="submit" class="btn btn-success">
                                                <!-- <span class="fa fa-search"> </span> -->
                                                Bibliotheque des types
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="words.php">
                                            <!-- <img src="../images/bibliotheque-villes.jpg" width="400px" height="200px"> -->
                                            <button type="submit" class="btn btn-success">
                                                <!-- <span class="fa fa-search"> </span> -->
                                                Bibliotheque des words
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td>
                                        <a href="expressions.php">
                                            <!-- <img src="../images/bibliotheque-affectations.jpg" width="400px" height="200px"> -->
                                            <button type="submit" class="btn btn-success">
                                                <!-- <span class="fa fa-search"> </span> -->
                                                Bibliotheque des expressions
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="avancer-content.php">
                                            <!-- <img src="../images/bibliotheque-etablissments.jpg" width="400px" height="200px"> -->
                                            <button type="submit" class="btn btn-success">
                                                <!-- <span class="fa fa-search"> </span> -->
                                                Vide...
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>