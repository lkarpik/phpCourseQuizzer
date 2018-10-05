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
        <form class="form" action="add.php" method="POST">
            <div class="form-group">
            <div class="form-row">          
                <div class="col-3">
                <label class="col-form-label" for="">Question number</label>
                </div>
                <div class="col-3">
                <input class="form-control" type="number" name="question_number">
                </div>
            </div> 
            <br>
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