<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    echo "<script>alert('You Can't access without login, Please login first');</script>";
    header("location: index.php");
    exit;
}

?>