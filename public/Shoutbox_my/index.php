<?php

include 'db.php';

$query = "SELECT * FROM newshouts ORDER BY time DESC limit 10"; 
$result = mysqli_query($con, $query);

if (empty($result)){
    echo "Database error: ".mysqli_errno($con);
    exit();
} 

mysqli_close($con);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shoutbox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css" />

    <script src="main.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1 class="bg-primary text-white text-center mb-1">Shoutbox!</h1>
        <div class="container bg-primary text-white p-2">

            <ul class="list-group">
                <?php while($row = mysqli_fetch_assoc($result)) : ?> 
                    <li class="list-group-item"><span class="text-primary"><?= $row['time'] ?> - <strong><?= $row['user'] ?></strong>: <?= $row['message'] ?></span></li>
                <?php endwhile; ?>            
            </ul>

            <form action="process.php" method="post">
                <div class="form-row mt-2">
                    <div class="form-group col-sm-6">
                    
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Your name">
                    </div>

                    <div class="form-group col-sm-6">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" placeholder="Enter Your message" rows="1"></textarea>
                    </div>                     
                </div>
                
                <div class="row justify-content-center">
                    <?php if (isset($_GET['error'])) : ?>

                        <span class="bg-danger mb-2"><?= $_GET['error'] ?></span>

                    <?php endif ?>
                    <input class="btn btn-secondary col-10" type="submit" name="submit" value="Send">
                </div>
            </form>
        </div>

    </div>
</body>
</html>