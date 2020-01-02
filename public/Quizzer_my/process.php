<?php
session_start();

include 'db.php';

if(!isset($_POST['submit'])) {
    header('Location: index.php');
    exit();
}

$number = $_POST['number'];
$answer_id = $_POST['answer'];
$next = $number + 1;
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
};



$query = "SELECT `id` FROM `answers` WHERE `id`='$answer_id' and `correct`= 1";

$result = $mysqli->query($query) or die('Query correnct answer error: '.$mysqli->error.__LINE__);

if($result->fetch_row()){
    $_SESSION['score']++;
}    

if ($next > $_SESSION['total']) {
    header('Location: finish.php');
} else{
    header('Location: question.php?number='.$next);
}

$result->close();
$mysqli->close();
?>