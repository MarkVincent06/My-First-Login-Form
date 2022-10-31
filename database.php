<?php

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "ita212";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if(!$conn) {
        die("FAILED TO CONNECT TO THE DATABASE!!!");
    }
?>