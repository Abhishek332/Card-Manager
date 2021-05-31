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
    if(isset($_POST['infobtn'])){
        extract($_POST);
        //$cpassword=strtolower($fname)." ".strtolower($lname);
        $image = $_FILES['image'];
        print_R($image);    
        $image_name = $image['name'];
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
        body{
            display : block;
        }

        .nav{
            height : 100px;
            width : 100%;
            background : #3939f696;
            display : flex;
            justify-content : space-between;
            align-items : center;
            padding : 0 50px;
        }

        .nav h1{
            margin : 0;
        }

        @media (max-width :450px){
            .nav{
                padding : 0 20px;
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
            overflow : hidden;
            border-radius : 50%;
        }

        .info input[type="file"]{
            width : 150px;
            height : 20px;
            border-radius : 20px;
            background : #eb163b91;
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
            transform : scale(0.98);
            box-shadow : inset 0px 0px 15px #0000006b;
        }


        .info{
            display : flex;
            flex-wrap : wrap;
            justify-content : center;
        }
        
        .info input{
            padding : 10px;
            margin : 20px;
            width : 100%;
            border : none;
            box-shadow : 0 0 5px 3px pink;
            border-radius: 5px;
            
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
        }

        .img-wrapper img{
            position : absolute;
            //width : 100%;
            height : 100%;
        }

        
        p{
            font-family : "RocknRollOne-Regular";
            font-size : 15px;
            text-align: center;
            color : rgb(196 21 21 / 86%);
            line-height : 25px;
        }

    </style>
</head>

<body>
    <div class="nav">
        <div>
            <h1>Card Manager</h1>
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
                <div class="img-wrapper">
                    <!-- <img src="<?php echo $row['image']; ?> " alt=""> -->
                    <?php echo $row['image']; ?>    
                </div>
                <input type="file" name="image" id="image" value=""/>
            </div>
            <input type="text" name="fname" id="fname" placeholder="First Name*" value="<?php echo $row['fname']; ?>" required/>
            <input type="text" name="lname" id="lname" placeholder="Last Name*"  value="<?php echo $row['lname']; ?>" required/>
            <input type="mobile" name="phone" id="phone" placeholder="Contact" value="<?php echo $row['phone']; ?>"/>
            <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $row['address']; ?>"/>
            <input type="mobile" name="whatsapp" id="whatsapp" placeholder="Whatsapp No." value="<?php echo $row['whatsapp']; ?>"/>
            <input type="text" name="company" id="company" placeholder="Company Name" value="<?php echo $row['company']; ?>"/>
            <input type="text" name="designation" id="designation" placeholder="Designation" value="<?php echo $row['designation']; ?>"/>
            <input type="url" name="github" id="github" placeholder="Github Link" value="<?php echo $row['github']; ?>"/>
            <input type="url" name="linkedin" id="linkedin" placeholder="LinkedIn Link" value="<?php echo $row['linkedin']; ?>"/>
            <input type="url" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $row['instagram']; ?>"/>
            <input type="url" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $row['twitter']; ?>"/>
            <input type="url" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $row['facebook']; ?>"/>
            <button id="infobtn" name="infobtn">Update info</button>
        </form>
    </div>
    <p>Your Card Password will be your Full Name. You can see your card by clicking the eye icon</p>
    <a href="card.php">
        <div class="img-wrapper">
            <img src="Images/eye.png" alt="">
        </div>
    </a>
</body>
</html>