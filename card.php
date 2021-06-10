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

    //Encryption for email
    // Choose cipher method
    $cipher = "AES-128-CBC";
    $encryption_key = 'card_manager';
    $option = 0;
    $encryption_iv = '9876543217539582';

    // Use of OpenSSL Encryption Function to encrypt the data
    $encryption = openssl_encrypt($email, $cipher, $encryption_key, $option, $encryption_iv);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/card.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>My Card</title>
</head>
<body>
    <a href="logout.php">
        <div class="logout">
            <img src="Images/log-btn.png" alt="">
        </div>
    </a>
    <div class="share-box">
        <h3>Share By</h3>
        <div class="share-icons">
            <a href="whatsapp://send?text=http%3A//card-manager.epizy.com/endcard.php?u=<?php echo $encryption;?>"
            data-action="share/whatsapp/share" target="_blank">
                <div class="icon">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </div>
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//card-manager.epizy.com/endcard.php?u=<?php echo $encryption;?>&title=&summary=&source=">
                <div class="icon">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </div>
            </a>
            <a href="https://twitter.com/intent/tweet?text=http%3A//card-manager.epizy.com/endcard.php?u=<?php echo $encryption;?>">
                <div class="icon">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </div>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//card-manager.epizy.com/endcard.php?u=<?php echo $encryption;?>">
                    <div class="icon">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </div>
            </a>
        </div>
    </div>

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