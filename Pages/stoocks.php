<?php
//header('Content-type: text/html; charset=utf-8');
//require_once('identifier.php');
//require_once("connexiondb.php"); 
?>
<! DOCTYPE HTML>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Ajouter des mots</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>





    <body>
        <?php include("menu.php"); ?>
        <div class="container">
            <div class="panel panel-success margetop">
                <div class="panel-heading">Nouveau Stagiaire...</div>
                <div class="panel-body">
                    <form method="post" action="insertStagiaire.php" enctype="multipart/form-data">
                        <div class="form-group">

                            <!-- ------------------------ Des inputs -------------------------------- -->

                            <!-- -------------------- Nom -------------------------------------------------------- -->
                            <div class="form-group">
                                <label for="nom">Nom du stagiaire :</label>
                                <input type="text" name="nom" placeholder="Nom du stagiaire" class="form-control" />
                            </div>


                            <!-- -------------------- prenom ----------------------------------------------------- -->
                            <div class="form-group">
                                <label for="prenom">prenom du stagiaire :</label>
                                <input type="text" name="prenom" placeholder="Prenom du stagiaire" class="form-control" />
                            </div>


                            <!-- ------------------- civilite ---------------------------------------------------- -->
                            <div class="form-group">
                                <label for="civilite">Civilite du stagiaire :</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="civilite" value="F" /> F
                                    </label><br>
                                    <label>
                                        <input type="radio" name="civilite" value="M" /> M
                                    </label>
                                </div>
                            </div>


                            <!-- -------------------- cin --------------------------------------------------------- -->
                            <div class="form-group">
                                <label for="cin">Carte d'identite nationale :</label>
                                <input type="text" name="cin" placeholder="Veuillez de saisir CIN" class="form-control" />
                            </div>


                            <!-- --------------------- adresse ------------------------------------------------------ -->
                            <div class="form-group">
                                <label for="adresse">Adresse du stagiaire :</label>
                                <input type="text" name="adresse" placeholder="Veuillez de saisir l'adresse" class="form-control" />
                            </div>


                            <!-- ------------------- telephone ---------------------------------------------------- -->
                            <div class="form-group">
                                <label for="telephone">Telephone du stagiaire :</label>
                                <input type="text" name="telephone" placeholder="Veuillez de saisir le telephone" class="form-control" />
                            </div>


                            <!-- ------------------- etablissement ------------------------------------------------- -->
                            <div class="form-group">
                                <label for="etablissement">Nom d'etablissement :</label>
                                <select name="etablissement" id="etablissement" class="form-control">
                                    <?php

                                    $resEt = $pdo->query("SELECT idEtablissement,nomEtablissement from etablissement")->fetchAll(PDO::FETCH_NUM);
                                    foreach ($resEt as $row) {
                                        echo "<option value=\"$row[0]\">$row[1]</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <!-- ------------------- ville ---------------------------------------------- -->
                            <div class="form-group">
                                <label for="ville">Ville etablissement :</label>
                                <select name="ville" id="ville" class="form-control">
                                    <?php

                                    $resVi = $pdo->query("SELECT idVille,nomVille from ville")->fetchAll(PDO::FETCH_NUM);
                                    foreach ($resVi as $row) {
                                        echo "<option value=\"$row[0]\">$row[1]</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <!-- -------------------- filiere ----------------------------- -->
                            <div class="form-group">
                                <label for="filiere">Filiere :</label>
                                <select name="filiere" id="filiere" class="form-control">
                                    <?php

                                    $resSe = $pdo->query("SELECT idFiliere,nomFiliere from filiere")->fetchAll(PDO::FETCH_NUM);
                                    foreach ($resSe as $row) {
                                        echo "<option value=\"$row[0]\">$row[1]</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <!-- -------------------- affectation ----------------------------------- -->
                            <div class="form-group">
                                <label for="nomaffectation">Veuillez de selectionner l'affectation souhaite:
                                </label>
                                <select name="affectation" id="affectation" class="form-control">
                                    <?php

                                    $res = $pdo->query("SELECT idAffectation,nomAffectation from affectation")->fetchAll(PDO::FETCH_NUM);
                                    foreach ($res as $row) {
                                        echo "<option value=\"$row[0]\">$row[1]</option>";
                                    }

                                    ?>
                                </select>
                            </div>




                            <!-- ------------------- Numero d'autorisation ----------------------------------------->
                            <div class="form-group">
                                <label for="nbrautorisation">Numero d'Autorisation :</label>
                                <input type="text" name="nbrautorisation" placeholder="Numero d'Autorisation" class="form-control" />
                            </div>



                            <!-- ------------------ parrain ----------------------------------------------------- -->
                            <div class="form-group">
                                <label for="parrain">Nom de parrain:</label>
                                <select name="parrain" id="parrain" class="form-control">
                                    <?php

                                    $resP = $pdo->query("SELECT idParrain,nomParrain from parrain")->fetchAll(PDO::FETCH_NUM);
                                    foreach ($resP as $row) {
                                        echo "<option value=\"$row[0]\">$row[1]</option>";
                                    }

                                    ?>
                                </select>
                            </div>



                            <!-- --------------------- Debut de period du stage ------------------------------------ -->
                            <div class="form-group">
                                <label for="datedu">Veuillez saisir le date de debut de la period du stage :</label>
                                <input type="text" name="datedu" placeholder="Debut du stage " class="form-control" />
                            </div>



                            <!-- -------------------- Fin de period du stage -------------------------------------- -->
                            <div class="form-group">
                                <label for="dateau">Veuillez saisir la date de fin de la period du stage :</label>
                                <input type="text" name="dateau" placeholder="la date de fin du stage" class="form-control" />
                            </div>





                            <!-- ---------------------- Cv ------------------------------------------------------ -->


                            <div class="form-group" enctype="multipart/form-data">
                                <label for="cv">Cv :</label>
                                <input type="file" name="cv" />
                            </div>






                            <button type="submit" class="btn btn-success">
                                <span class="fa fa-plus"> </span>
                                Ajouter
                            </button>
                        </div>
                        &nbsp &nbsp
                    </form>


                </div>
            </div>
        </div>
    </body>

    </html>