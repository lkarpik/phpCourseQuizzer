<?php
session_start();
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
        <h3>Gratulations! You finished quizz</h3>
        
        <p>Your score: 
        <?php 
            echo($_SESSION['score']); 
            unset($_SESSION['score']);
        ?></p>
        
        <div class="container d-flex justify-content-around">
        <a href="question.php?number=1" class="btn btn-primary">Start a new Quiz</a>
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