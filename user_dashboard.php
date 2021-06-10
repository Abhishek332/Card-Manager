<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
else{
    include 'connection.php';
    $email = $_SESSION['email'];
    $query = "SELECT * from userdata where email= '$email'";
    $query_run =  mysqli_query($conn, $query);
    $row= mysqli_fetch_assoc($query_run);
    if(isset($_POST['infobtn'])){
        extract($_POST);
        $image = $_FILES['image'];
        $image_name = $image['name'];
        if(!empty($image_name)){
            $image_tmp = $image['tmp_name'];
            $image_extension = explode('.', $image_name); //to explode to string into two parts name and extention
            $image_check = strtolower(end($image_extension));
            $extention_array = array('jpg', 'jpeg', 'png');
            if(in_array($image_check, $extention_array)){
                $destination_file = 'Uploads/'.$image_name;
                move_uploaded_file($image_tmp, $destination_file);
                $sql = "UPDATE userdata SET fname='$fname', lname='$lname', image='$image_name', phone='$phone',
                        whatsapp='$whatsapp', address='$address', company='$company', designation='$designation',
                        github='$github', linkedin='$linkedin', twitter='$twitter', instagram='$instagram',
                        facebook='$facebook' WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);  
                if($result){
                    echo "<script> alert('Info Updated Successfully'); </script>";
                }
            }
            else{
                echo "<script>alert('You only can upload .jpg, .jpeg or .png file in Image Section');</script>";
            }
        }
        else{
            $sql = "UPDATE userdata SET fname='$fname', lname='$lname', phone='$phone',
                        whatsapp='$whatsapp', address='$address', company='$company', designation='$designation',
                        github='$github', linkedin='$linkedin', twitter='$twitter', instagram='$instagram',
                        facebook='$facebook' WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);  
            if($result){
                echo "<script> alert('Info Updated Successfully'); </script>";
            }
        }
    }
    $query = "SELECT * from userdata where email= '$email'";
    $query_run =  mysqli_query($conn, $query);
    $row= mysqli_fetch_assoc($query_run);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Card Manager</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .nav{
            width : 100%;
            background : #3939f696;
            display : flex;
            justify-content : space-between;
            align-items : center;
            padding : 20px 50px;
        }

        .nav h1{
            margin : 0;
        }

        @media (max-width :450px){
            .nav{
                padding : 20px;
            }

            .nav h1{
                font-size : 40px;
            }
        }

        .wrapper{
            max-width : 700px;
            margin : 20px auto;
            font-size : 15px;
            transition: all 0.5s linear;
        }

        .img-input{
            width : 100%;
            display : flex;
            justify-content : center;
            align-items : center;
            flex-direction : column;
        }

        .img-input .img-wrapper{
            width : 80px;
            height : 80px;
            position : relative;
            border-radius : 50%;
            display : flex;
            justify-content : center;
            box-shadow : 0 0 15px #751616b8;
        }

        .img-input label{
            display : flex;
            align-items : center;
            flex-direction : column;
        }

        .info input[type="file"]{
            display : none;
        }

        .logout{
            height : 50px;
            width : 50px;
            border-radius : 50%;
            box-shadow : inset 0px 0px 5px #0000ff96, 0 0 10px #3d927f;
            transition : all 0.2s linear;
            position : relative;
            background : white;
        }

        .logout img{
            position : absolute;
            width : 100%;
            height : 100%;
        }

        .logout:hover{
            transform : scale(0.9);
            box-shadow : inset 0px 0px 15px #0000006b;
        }


        .info{
            display : flex;
            flex-wrap : wrap;
            justify-content : center;
        }
        
        .info div{
            margin : 20px;
            width : 100%;
        }

        .info div input{
            padding : 10px;
            width : 100%;
            border : none;
            box-shadow : 0 0 5px 3px pink;
            border-radius: 5px;
            margin-top : 10px;
            font-size : 15px;
        }

        .info div label{
            font-weight : bold;
            color : #eb1036d6;
        }

        .info button{
            padding : 10px 50px;
            margin : 20px;
            border : none;
            background : linear-gradient(rgb(211, 80, 80) 0.2%, rgb(190, 132, 132) 70%, rgb(211, 80, 80) 100%);
            border-radius: 10px;
            font-family : "RocknRollOne-Regular";
            color : white;
            cursor : pointer;
        }

        .info button:hover{
            background : linear-gradient(rgb(133, 8, 8) 0.2%, rgba(240, 105, 105, 0.829) 70%, rgb(133, 8, 8) 100%);
        }

        .img-wrapper{
            height : 30px;
            width : 50px;
            position : relative;
            margin : 20px auto;
            overflow : hidden;
            display : flex;
            align-items : center;
            border-radius : 50%;
        }

        .img-wrapper img{
            position : absolute;
            width : 100%;
        }
        
        p{
            font-family : "RocknRollOne-Regular";
            font-size : 15px;
            text-align: center;
            color : rgb(196 21 21 / 86%);
            line-height : 25px;
        }

        a{
            text-decoration : none;
        }

    </style>
</head>

<body>
    <div class="nav">
        <div>
            <a href="#"><h1>Card Manager</h1></a>
        </div>
        <a href="logout.php">
            <div class="logout">
                <img src="Images/log-btn.png" alt="">
            </div>
        </a>
    </div>
    <div class="wrapper">
        <form action="" class="info" method="POST" enctype="multipart/form-data">
            <div class="img-input">
                <label for="image">
                    <div class="img-wrapper">
                        <?php if($row['image']== NULL){?>
                            <img src="Images/camera.png" style="opacity : 0.8;" alt="">
                        <?php }else{ ?>
                            <img src="Uploads/<?php echo $row['image']; ?>" alt="">
                        <?php } ?>
                    </div>
                    Upload Your Picture Here
                </label>
                <input type="file" name="image" id="image"/>
            </div>
            <div>
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" placeholder="First Name*" value="<?php echo $row['fname']; ?>" required/>
            </div>
            <div>
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" placeholder="Last Name*"  value="<?php echo $row['lname']; ?>" required/>
            </div>
            <div>
                <label for="mobile">Contact</label>
                <input type="mobile" name="phone" id="phone" placeholder="Contact" value="<?php echo $row['phone']; ?>"/>
            </div>
            <div>
                <label for="address">WhatsApp</label>
                <input type="mobile" name="whatsapp" id="whatsapp" placeholder="Enter Your Whatsapp No. with country code" value="<?php echo $row['whatsapp']; ?>"/>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $row['address']; ?>"/>
            </div>
            <div>
                <label for="company">Company Name</label>
                <input type="text" name="company" id="company" placeholder="Company Name" value="<?php echo $row['company']; ?>"/>
            </div>
            <div>
                <label for="designation">Your Designation</label>
                <input type="text" name="designation" id="designation" placeholder="Designation" value="<?php echo $row['designation']; ?>"/>
            </div>
            <div>
                <label for="github">GitHub Account</label>
                <input type="url" name="github" id="github" placeholder="Github Link" value="<?php echo $row['github']; ?>"/>
            </div>
            <div>
                <label for="linkedIn">LinkedIn Account</label>
                <input type="url" name="linkedin" id="linkedin" placeholder="LinkedIn Link" value="<?php echo $row['linkedin']; ?>"/>
            </div>
            <div>
                <label for="instagram">Instagram Account</label>
                <input type="url" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $row['instagram']; ?>"/>
            </div>
            <div>
                <label for="twitter">Twitter Account</label>
                <input type="url" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $row['twitter']; ?>"/>
            </div>
            <div>
                <label for="facebook">Facebook Account</label>
                <input type="url" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $row['facebook']; ?>"/>
            </div>
            <button id="infobtn" name="infobtn">Update info</button>
        </form>
    </div>
    <p>You can see your card by clicking the eye icon</p>
    <a href="card.php">
        <div class="img-wrapper">
            <img src="Images/eye.png" alt="">
        </div>
    </a>
</body>
</html>