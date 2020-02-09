<?php
// require_once('identifier.php');    //pour s'edentifer
require_once("connexiondb.php");
$courseID = $_GET['id'];
$tawalt_ID = null;
$qReqCourseID = "SELECT * FROM question WHERE course_ID = '$courseID'";
$qRes0 = $pdo->query($qReqCourseID);
$question = null;
$ID = null;
if (isset($_GET['q'])) {
    $ID = $_GET['q'];
    $qReq = "SELECT * FROM question WHERE ID = '$ID'";
    $qRes1 = $pdo->query($qReq);
    if ($x = $qRes1->fetch()) {
        $question = $x;
    }
} else {
    $index = 0;
    foreach ($qRes0 as $x) {
        if ($index == 0) {
            $question = $x;
            $ID = $x['ID'];
        }
        $index++;
    }
}

if(isset($_POST['submit'])){
    
    echo "qns".$_POST['answer'];
    echo "tawalt".$tawalt_ID;
    if($_POST['answer'] == $tawalt_ID) {
        header('location:course.php?id='.$courseID.'&q=2');
    } 
}

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
    <?php
    $tawalt_ID = $question['tawalt_ID'];
    $word = null;
    $category = "";
    $wReq = "SELECT t.ID AS ID, w.label AS eLabel, t.tifinagh AS label, t.category AS category
     FROM word w, tawalt t 
     WHERE t.ID = '$tawalt_ID' 
     AND w.tawalt_ID = '$tawalt_ID'";
    $wRes = $pdo->query($wReq);
    if ($x = $wRes->fetch()) {
        $word = $x;
        $category = $x['category'];
    }
    $options = $pdo->query("SELECT * FROM tawalt WHERE category = '$category' AND ID <> '$tawalt_ID' order by RAND() LIMIT 2")->fetchAll(PDO::FETCH_ASSOC);
    array_push($options, $word);
    shuffle($options);
    ?>
    <div class="container">
        <div class="panel panel-primary margetop">
            <div class="col-md-10">
                <div class="col-md-auto">
                    
                <form action="" method="post">
                    <!-- Progression bar -->
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100" style="width:12.2%">
                            12,2% Complete
                        </div>
                    </div>
                    <div><br />
                        <h3> <?php echo $question['label']  ?> </h3>
                        <h5>* <?php echo $word['eLabel']  ?> </h5>
                        
                        <?php foreach ($options as $option) { ?>
                        <div class="checkbox">
                            <input type="radio" name="answer" value="<?php echo $option['ID']  ?>">&nbsp;&nbsp;<?php echo $option['label']  ?>
                        </div>
                        
                        <?php
                        }
                        ?>
                    </div>
                        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" role="button">
                            <span class="fa fa-log-out"></span>&nbsp;&nbsp;&nbsp;&nbsp; Check
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

<footer>

</footer>

</html>