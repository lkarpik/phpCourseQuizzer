<?php
include 'db.php';
session_start();

$query = "SELECT `id` FROM `questions`";

$result = $mysqli->query($query) or die('Server error: '.$mysqli->error);

$_SESSION['total'] = $result->num_rows;

$result->close();
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quizzer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css" />
    <script src="main.js"></script>
</head>
<body>
<header>
    <div class="container text-center mt-5">
        <h1> Welcome to Quizzer </h1>
        <small>Add questionsts and run it</small>
        <hr class="bg-primary ">
        <br>
        
    </div>
</header>        
<main>
    <div class="container">
        <p>Total questions in database: <?= $_SESSION['total'] ?></p>
        <p>Time to finish: <?php echo ($_SESSION['total'] * 0.5) ?> minutes</p>
        
        
        <div class="container d-flex justify-content-around">
        <a href="question.php?number=1" class="btn btn-primary">Start  a Quiz</a>
        <a href="add.php" class="btn btn-info">Add question</a>
        </div>
        <br>
        <hr class="bg-primary ">     
    </div>
</main>
<footer>
    <div class="container">
    <small class="text-disabled">All right by Quizzer &copy</small>
    </div>
</footer>
    
</body>
</html>