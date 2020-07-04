<?php
include 'models/Question.php';
session_set_cookie_params(3600, "/");
session_start();   // in top of PHP file

// require_once('identifier.php');    //pour s'edentifer
require_once("connexiondb.php");
$courseID = $_GET['id'];
$qReqCourseID = "SELECT * FROM question WHERE course_ID = '$courseID'";
$qRes0 = $pdo->query($qReqCourseID);
$arrayOfQuestions = [];
$index = 0;
foreach ($qRes0 as $x) {
    $question = new Question($x['ID'], $x['label'], $x['type'], $x['tawalt_ID']);
    if ($index == 0) {
        $_SESSION["first_Question"] = $question;
    }
    array_push($arrayOfQuestions, $question);
    $index++;
}
$_SESSION["questions"] = $arrayOfQuestions;
header('location:question.php');
