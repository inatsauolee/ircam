<?php
session_set_cookie_params(3600, "/");
session_start();
// require_once('identifier.php');    //pour s'edentifer
require_once("connexiondb.php");
$_SESSION["collection_ID"] = $collectionID = $_GET['id'];
$requete = "SELECT * FROM course WHERE collection_ID = '$collectionID'";
$resultatEt = $pdo->query($requete)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Avancer </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>

<body>
    <?php include("menu.php"); ?>
    <div class="jumbotron text-center">
        <div class="row-md-2">
            <h1>Learning Zone</h1>
        </div>
    </div>

    <div class="container">

        <div class="panel panel-primary margetop">
            <div class="panel-heading">Courses</div>
            <div class="panel-body">
                <div class="panel-body">
                    <table class="table table-striped table-bordered" class="form-inline">
                        <thead>

                            <?php foreach ($resultatEt as $course) { ?>
                                <tr align="center">
                                    <td>
                                        <span><?php echo $course['level'] ?></span>
                                        <a href="course.php?id=<?php echo $course['ID'] ?>">
                                            <!-- <img src="../images/bibliotheque-parrains.jpg" width="400px" height="200px"> -->
                                            <button type="submit" class="btn btn-success">
                                                <!-- <span class="fa fa-search"> </span> -->
                                                <?php echo $course['label'] ?>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>

</footer>

</html>