<?php
include 'db.php';
session_start();

if (isset($_POST['submit'])) {

    $question_number = mysqli_real_escape_string($mysqli, $_POST['question_number']);
    $question_text = mysqli_real_escape_string($mysqli, $_POST['question_text']);
    $answers = array();
    $answers[1] = mysqli_real_escape_string($mysqli, $_POST['answer1']);
    $answers[2] = mysqli_real_escape_string($mysqli, $_POST['answer2']);
    $answers[3] = mysqli_real_escape_string($mysqli, $_POST['answer3']);
    $correct = mysqli_real_escape_string($mysqli, $_POST['correct']);

    $query = "INSERT INTO `questions` (question_number, question_text) 
                VALUES('$question_number', '$question_text')";
    $mysqli->query($query) or die($mysqli->error.__LINE__);
    
    foreach ($answers as $key => $value) {
        
        if ($correct == $key) {
            $correct_answer = 1;
        } else $correct_answer = 0;

        $query = "INSERT INTO `answers` (question_number, answer_text, correct) 
                    VALUES('$question_number', '$value', '$correct_answer')";
        $mysqli->query($query) or die($mysqli->error.__LINE__);

    }
    header('Location: index.php');
}
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
    <h3 class="text-center">Add a question</h3>
    <div class="container">
        <form action="add.php" method="POST">
            <div class="form-group">
                <div class="form-row">          
                    <div class="col-3">
                        <label class="col-form-label" for="">Question number</label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="number" name="question_number" value="<?= $_SESSION['total']+1 ?>">
                    </div>
                </div>           
                <p><label for="">Question text</label>
                <input class="form-control" type="text" name="question_text"></p>
                <p><label for="">Answer #1</label>
                <input class="form-control" type="text" name="answer1"></p>
                <p><label for="">Answer #2</label>
                <input class="form-control" type="text" name="answer2"></p>
                <p><label for="">Answer #3</label>
                <input class="form-control" type="text" name="answer3"></p>
                <div class="form-row">          
                    <div class="col-3">
                        <label class="col-form-label" for="">Correct answer</label>
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="number" name="correct">
                    </div>
                </div>
                           
            </div>
            <div class="container d-flex justify-content-around">
            <input type="submit" value="Add question" name="submit" class="btn btn-primary">            
            <a href="index.php" class="btn btn-secondary">Main page</a>   
            </div>
        </form>
    
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