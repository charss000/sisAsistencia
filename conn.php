<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="bd_asistencia";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }
?>