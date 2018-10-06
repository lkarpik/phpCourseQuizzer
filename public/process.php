<?php
include 'db.php';

if(!isset($_POST['submit'])) {
    header('Location: index.php');
    exit();
}

$number = $_POST['number'];
$answer = $_POST['answer'];
// find if correct 

?>