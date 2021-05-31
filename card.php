<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        echo "<script>alert('You Can't access without login, Please login first');</script>";
        header("location: index.php");
        exit;
    }
    else{
    include 'connection.php';
    $email = $_SESSION['email'];
    $sql = "Select * from userdata where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css'>
    <title>My Card</title>
    <style>
    .card-container{
        min-width : 300px;
        height : 500px;
        border-radius : 20px;
        box-shadow : 0 0 2px black;
    }

    .card-container .img-wrapper{
        height : 280px;
        width : 100%;
        border : 1px solid black;
        border-radius : 20px 20px 0 0;
        position : relative;
        overflow : hidden;
    }

    .card-container .content{
        margin : 10px;
       // border: 1px solid black;
    }

    .card-container .content .details{
        margin-left : 15px;
        letter-spacing : 0.1rem;
    }

    .card-container .content .details h3{
        font-family : "RocknRollOne-Regular";
        font-size : 18px;
        line-height : 30px;  
    }

    
    .card-container .content .details h4{
        margin : 4px 0px;
        letter-spacing   : 2px;
        font-size : 12px;
    }

    .card-container .content .links{
        border : 1px solid black;
        margin : 15px;
    }

    .card-container .content .links .link{
        display : flex;
        justify-content : space-beetween;
        align-items : center;
        margin : 10px 0;
    }

    .card-container .content .links .link .icon{
        height : 25px;
        width : 25px;
        border-radius : 50%;
        background : pink;
        margin-right : 15px;
    }

    .card-container .content .links .link .icon i{
        
    }

    .card-container .content .link a{
        text-decoration : none;
        font-family : "Raleway-Medium";
        color : black;
    }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="img-wrapper">
            
        </div>
        <div class="content">
            <div class="details">
                <h3><?php echo $row['fname']." ".$row['lname']; ?></h3>
                <h4><?php echo $row['designation']; ?></h4>
                <h4><?php echo $row['company']; ?></h4>
            </div>
            <div class  ="links">
                
                <div class="link">
                    <div class="icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <a href="https://www.gmail.com/"><?php echo $row['email']; ?></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>