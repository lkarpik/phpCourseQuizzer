<?php

$db_host = '192.168.10.10';
$db_name = 'quiz';
$db_user = 'homestead';
$db_pass = 'secret';

// Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// phpMyAdmin not working with vagrant
    // $mysqli = new mysqli('127.0.0.1', 'root', '', 'quiz');

if($mysqli->connect_error) {
    echo "database error: ".$mysqli->connect_error;
} else {
    echo "Connection successful";
}
