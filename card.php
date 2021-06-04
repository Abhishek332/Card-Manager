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
    <!-- <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css'> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>My Card</title>
    <style>
    :root{
        --magic : #f42246d9;
    }

    .card-container{
        min-width : 350px;
        border-radius : 20px;
        box-shadow : 0 0 10px var(--magic);
        background : #d4f9ff7d;
        margin-top : 200px;
    }

    .card-container .img-wrapper{
        height : 380px;
        width : 100%;
        border-radius : 20px 20px 0 0;
        position : relative;
        overflow : hidden;
        display : flex;
        justify-content : center;
        clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0 88%);
    }

    .card-container .img-wrapper img{
        width : 100%;
        position : absolute;
        
    }

    .card-container .content{
        margin : 0 10px;
    }

    .card-container .content .details{
        margin : 0 0 30px 15px;
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
        font-size : 13px;
    }

    .card-container .content .links{
        margin : 20px 15px;
        color : var(--magic);
        font-weight : bold;
    }

    .card-container .content .links .link{
        display : flex;
        justify-content : space-beetween;
        align-items : center;
        margin : 15px 0;
    }

    .card-container .content .links .link .icon{
        height : 28px;
        width : 28px;
        border-radius : 50%;
        background : var(--magic);
        margin-right : 15px;
        display : flex;
        justify-content : center;
        align-items : center;
        padding : 1px;
    }

    .card-container .content .links .link .icon i{
        color : white;
    }

    .card-container .content .links a{
        text-decoration : none;
        font-family : "Raleway-Medium";
        color : var(--magic);
    }

    </style>
</head>
<body>
    <div class="card-container">
        <div class="img-wrapper">
            <?php if($row['image']== NULL){?>
                <img src="Images/camera.png" style="opacity : 0.8;" alt="">
            <?php }else{ ?>
                <img src="Uploads/<?php echo $row['image']; ?>" alt="">
            <?php } ?>
        </div>
        <div class="content">
            <div class="details">
                <h3><?php echo $row['fname']." ".$row['lname']; ?></h3>
                <h4><?php echo $row['designation']; ?></h4>
                <h4>At <?php echo $row['company']; ?></h4>
            </div>
            <!-- ========================== Links Start ============================ -->
            <div class  ="links">
                <!-- ---------------------- Email -------------------------- -->
                <?php if($row['email']!=NULL){ ?>
                    <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&to=<?php echo $row['email']; ?>">
                        <div class="link">
                            <div class="icon">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </div>
                            <?php echo $row['email']; ?>
                        </div>
                    </a>
                <?php }
                // ---------------------- Address --------------------------
                if($row['address']!=NULL){ ?>
                    <div class="link">
                        <div class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <?php echo $row['address']; ?>
                    </div>
                <?php }
                // ---------------------- Contact --------------------------
                if($row['phone']!=NULL){ ?>
                    <div class="link">
                        <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <?php echo $row['phone']; ?>
                    </div>
                <?php }
                // ---------------------- Whatsapp --------------------------
                if($row['whatsapp']!=NULL){ ?>
                    <a href="https://wa.me/<?php echo $row['whatsapp'];?>">
                        <div class="link">
                            <div class="icon">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            </div>
                            WhatsApp
                        </div>
                    </a>
                <?php }
                // ---------------------- Github --------------------------
                if($row['github']!=NULL){ ?>
                    <a href="<?php echo $row['github']; ?>">
                        <div class="link">
                            <div class="icon">
                                <i class="fa fa-github" aria-hidden="true"></i>
                            </div>
                            Github
                        </div>
                    </a>
                <?php }
                // ---------------------- LinkedIn --------------------------
                if($row['linkedin']!=NULL){ ?>
                    <a href="<?php echo $row['linkedin']; ?>">
                        <div class="link">
                            <div class="icon">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </div>
                            LinkedIn
                        </div>
                    </a>
                <?php }
                // ---------------------- Twitter --------------------------
                if($row['twitter']!=NULL){ ?>
                    <a href="<?php echo $row['twitter']; ?>">
                        <div class="link">
                            <div class="icon">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </div>
                            Twitter
                        </div>
                    </a>
                <?php }
                // ---------------------- Instagram --------------------------
                if($row['instagram']!=NULL){ ?>
                    <a href="<?php echo $row['instagram']; ?>">
                        <div class="link">
                            <div class="icon">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </div>
                            Instagram
                        </div>
                    </a>
                <?php }
                // ---------------------- Facebook --------------------------
                if($row['facebook']!=NULL){ ?>
                    <a href="<?php echo $row['facebook']; ?>">
                        <div class="link">
                            <div class="icon">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </div>
                            Facebook
                        </div>
                    </a>
                <?php } ?>
            </div>
            <!-- ========================== Links End ============================ -->
        </div>
    </div>
</body>
</html>