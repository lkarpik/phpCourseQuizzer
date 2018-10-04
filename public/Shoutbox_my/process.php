<?php 

include 'db.php';

if (!isset($_POST['submit'])){
    header ('Location: index.php');
    exit();
}

$name = mysqli_real_escape_string($con, $_POST['name']);
$message = mysqli_real_escape_string($con, $_POST['message']);

if (empty($name) || !isset($_POST['name']) || empty($message) || !isset($_POST['message'])) {
    $error = "Please enter Your name and message";
    header ('Location: index.php?error='.urlencode($error));
    exit();
} 

date_default_timezone_set('Europe/Warsaw');
$time = date('H:i:s');  

$query = "INSERT INTO newshouts (user, message, time) VALUES ('$name', '$message', '$time')";
if (!mysqli_query($con, $query)) {
    echo "Insert querry databse error: ".mysqli_errno($con);
    exit();
}
header('Location: index.php');
mysqli_close($con);