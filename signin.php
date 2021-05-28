<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connection.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from userdata where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                //$_SESSION['username'] = $username;
                header("location: user_dashboard.php");
            } 
            else{
                $showError = "Invalid Credentials";
                echo "<script>alert($showError)</script>";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
        echo "<script>alert($showError)</script>";
    }
}
    
?>