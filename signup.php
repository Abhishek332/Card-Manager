<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connection.php';
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    

    // Check whether this email exists
    $existSql = "SELECT * FROM `userdata` WHERE email='$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = true;
        if($showError){
            echo "<script>alert('Email Already Used Please Use a Different One')</script>";
        }
    }
    else{
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `userdata` ( `email`, `password`) VALUES ('$email', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
                if($showAlert){
                    echo "<script>alert('Your account is now created and you can login');</script>";
                }
            }
        }
        else{
            $showError = true;
            if($showError){
                echo "<script>alert('Please Enter Same Password in Both Section');</script>";
                header("location: user_dashboard.php");
            }
        }
    }
}
?>