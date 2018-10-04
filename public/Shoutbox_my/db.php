<?php

// connection to database

$con = mysqli_connect('192.168.10.10', 'homestead', 'secret', 'shoutit');

if (mysqli_connect_errno()) {
    echo "Error conecting to database: ".mysqli_connect_error();
} 
// 

$createTable = "CREATE TABLE IF NOT EXISTS newshouts (
            id int NOT NULL AUTO_INCREMENT,
            user varchar(50),
            message text(250),
            time time,
            PRIMARY KEY (id)
            )";
if(!mysqli_query($con, $createTable)) {
    echo "Server error: ".mysqli_errno($con);
    exit();
} 
    

 