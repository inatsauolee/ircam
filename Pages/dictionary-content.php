<?php
//require_once('identifier.php');
require_once("connexiondb.php");

$value = "";
$answer = isset($_GET['answer']) ? $_GET['answer'] : "";


$from = isset($_GET['from']) ? $_GET['from'] : "en";
$to = isset($_GET['to']) ? $_GET['to'] : "tmz";

function get_language($input)
{
    if ($input == "en") {
        echo "English";
    }
    if ($input == "tmz") {
        echo "Tamazight";
    }
}

if (isset($_POST['answer'])) {
    $answer = $_POST['answer'];
    if ($from == "en") {
        $requete = "select * from tawalt where ID IN (select tawalt_ID from word where label='$answer')";
        $resultat = $pdo->query($requete);

        if ($tawalt = $resultat->fetch()) {
            $value = $tawalt['label'];
        }
    }
    if ($from == "tmz") {
        $requete = "select * from word where ID IN (select ID from tawalt where label='$answer')";
        $resultat = $pdo->query($requete);

        if ($word = $resultat->fetch()) {
            $value = $word['label'];
        }
    }
}


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
                        <table class="table table-striped table-bordered " class="form-inline">
                            <thead>
                                <tr>
                                    <div class="row" align="center">
                                        <span>From:
                                            <?php echo get_language($from) ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;
                                        </span>
                                        <form action="dictionary.php?from=<?php echo $to ?>&to=<?php echo $from ?>" method="post">
                                            <button type="submit" class="btn btn-info btn-sm " role="button">
                                                <span class="glyphicon glyphicon-save"></span>&nbsp;&nbsp;&nbsp;&nbsp; Switch
                                            </button>
                                        </form>

                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            To: <?php echo get_language($to) ?>
                                        </span>
                                    </div>
                                </tr>
                                <form action="" method="post">
                                    <tr>
                                        <td align="center">
                                            <div class="form-group">
                                                <input class="form-control input-lg" id="answer-from" name="answer" type="text" placeholder="Write here" value=<?php echo '"' . $answer . '"'; ?>>
                                            </div>
                                        </td>
                                        <td align="center">

                                            <div class="form-group">
                                                <input class="form-control input-lg" id="answer-to" type="text" placeholder="" value="<?php echo $value ?>" disabled>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">

                                            <button type="submit" class="btn btn-info btn-lg btn-block" role="button" >
                                                <span class="glyphicon glyphicon-save"></span>&nbsp;&nbsp;&nbsp;&nbsp; Go...
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>