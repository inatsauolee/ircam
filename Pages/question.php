<?php
include 'models/Question.php';
session_set_cookie_params(3600, "/");
session_start();
require_once("connexiondb.php");
if(isset($_SESSION["first_Question"])) {
    $arrayOfQuestions = $_SESSION["questions"];
    $question = $_SESSION["first_Question"];
    print_r($question);
    print_r($arrayOfQuestions);
    $visibility = "hidden";
} else {
    header('location:collection.php?id='.$_SESSION["collection_ID"]);
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
    $tawalt_ID = $question->get_tawalt_ID();
    if(isset($_SESSION["options"]) && isset($_SESSION["word"])) {
        $options = $_SESSION["options"];
        $word = $_SESSION["word"];
    } else {
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
        $_SESSION["options"] = $options;
        $_SESSION["word"] = $word;
    }
    $answer = null;
    if (isset($_POST['check'])) {
        if(isset($_POST['answer'])) {
            if ($_POST['answer'] == $tawalt_ID) {
                $answer = "CORRECT";
            } else {
                $answer = "Wrong Answer, the right answer is: ".$word['label'];
            }
            $_SESSION["answer"] = $_POST['answer'];
            answer_question();
            $visibility = "visible";
        }
    }

    if (isset($_POST['next'])) {
        $_SESSION["first_Question"] = get_next_Question();
        unset($_SESSION["options"]);
        unset($_SESSION["word"]);
        unset($_SESSION["answer"]);
        header('location:question.php');
    }

    function answer_question() { 
        $array = $_SESSION["questions"];
        $question = $_SESSION["first_Question"];
        $id = $question->id;
        foreach ($array as $element) {
           if($element->id === $id) {
            $element->set_answered(1);
           } 
        }
    }

    function get_next_Question() { 
        $array = $_SESSION["questions"];
        foreach ($array as $element) {
           if($element->answered === 0) {
               return $element;
           } 
        }
        return null;
    }
    
    ?>

    <div class="container">
        <div class="panel panel-primary row">
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
                            <h3> <?php echo $question->get_label()  ?> </h3>
                            <h5>* <?php echo $word['eLabel']  ?> </h5>

                            <?php foreach ($options as $option) { ?>
                                <div class="checkbox">
                                    <input type="radio" name="answer" <?php echo $option['ID'] == (isset($_SESSION["answer"]) ? $_SESSION["answer"] : null) ? "checked" : ""; ?> value="<?php echo $option['ID']  ?>">&nbsp;&nbsp;<?php echo $option['label']  ?>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <button type="submit" name="check" class="btn btn-success btn-lg btn-block" role="button">
                            <span class="fa fa-log-out"></span>&nbsp;&nbsp;&nbsp;&nbsp; Check
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <div class="panel panel-primary row" style="visibility: <?php echo $visibility ?>">
            <div class="col-md-10">
                <div class="col-md-auto">
                    <form action="" method="post">
                        <div>
                           Result
                        </div>
                        <div>
                           <?php echo $answer; ?>
                        </div>
                        <button type="submit" name="next" class="btn btn-success btn-lg btn-block" role="button">
                            <span class="fa fa-log-out"></span>&nbsp;&nbsp;&nbsp;&nbsp; NEXT
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