<?php

    session_start();

    $server_name = "localhost";
    $user = "root";
    $pass = "";
    $db = "saludo";

    $conn = mysqli_connect($server_name,$user, $pass, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>