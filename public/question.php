<?php
include 'db.php';

session_start();
$number = mysqli_real_escape_string($mysqli, $_GET['number']);
$query = "SELECT * FROM `questions` WHERE `question_number`='$number'";

$result = $mysqli->query($query) or die("Question database error: ".$mysqli->error.__LINE__);

$question = $result->fetch_assoc();

$result->close();

$query = "SELECT * FROM `answers` WHERE `question_number`='$number'";
$result = $mysqli->query($query) or die("Answer databasae error: ".$mysqli->error.__LINE__);


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
        <p>Question <?= $number ?> from <?= $_SESSION['total'] ?></p>
        
        <h4><strong><?= $question['question_text'] ?></strong></h4>
        
        <form action="pocess.php" method="post">
        <?php while($row = $result->fetch_assoc()) : ?>
            <div class="radio">
                <label><input type="radio" name="answer" value="$row['id']" > <?= $row['answer_text'] ?></label>              
            </div>
            <?php endwhile; ?>
            
            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
            <input type="hidden" name="number" value="$number">
        </form>
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