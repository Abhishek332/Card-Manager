<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    echo "<script>alert('You Can't access without login, Please login first');</script>";
    header("location: index.php");
    exit;
}
else{
    if(isset($_POST['infobtn'])){
        $email = $_SESSION['email'];
        include 'connection.php';
        extract($_POST);
        echo "SUCCESSFUL";
        $sql = "UPDATE userdata SET photo='$image', fname='$fname', lname='$lname', phone='$phone',
        whatsapp='$whatsapp', address='$address', company='$company', designation='$designation',
        github='$github', linkedin='$linkedin', twitter='$twitter', instagram='$instagram',
        facebook='$facebook' WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if($sql){
             echo "<script> alert('Info Updated Successfully'); </script>";
        }
    }
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
            
        }

        .info input[type="file"]{
            width : 80px;
            height : 80px;
            border-radius : 50%;
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
        <form action="" class="info">
            <div class="img-input">
                <input type="file" name="image" id="image" value="" required/>
            </div>
            <input type="text" name="fname" id="fname" placeholder="First Name*" required/>
            <input type="text" name="lname" id="lname" placeholder="Last Name*" required/>
            <input type="mobile" name="phone" id="phone" placeholder="Contact*" required/>
            <input type="text" name="address" id="address" placeholder="Address" required/>
            <input type="mobile" name="whatsapp" id="whatsapp" placeholder="Whatsapp No." />
            <input type="text" name="company" id="company" placeholder="Company Name"/>
            <input type="text" name="designation" id="designation" placeholder="Designation"/>
            <input type="url" name="github" id="github" placeholder="Github Link"/>
            <input type="url" name="linkedin" id="linkedin" placeholder="LinkedIn Link"/>
            <input type="url" name="instagram" id="instagram" placeholder="Instagram"/>
            <input type="url" name="twitter" id="twitter" placeholder="Twitter"/>
            <input type="url" name="facebook" id="facebook" placeholder="Facebook"/>
            <button id="infobtn" name="infobtn">Update info</button>
        </form>
    </div>
</body>
</html>