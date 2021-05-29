<!-- <?php
    echo "<script>var cpass = prompt('Enter Card Password');</script>";
    $cpassword = "<script>document.writeln(cpass);</script>";
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>My Card</title>
    <style>
    .card-container{
        min-width : 300px;
        height : 500px;
        border-radius : 20px;
        box-shadow : 0 0 2px black;
    }

    .card-container .img-wrapper{
        height : 300px;
        width : 100%;
        border : 1px solid black;
        border-radius : 20px 20px 0 0;   
    }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="img-wrapper">
            <img src="" alt="">
        </div>
        <div class="content">
            <h1>Abhishek Porwal</h1>
            <h2>Web Developer Intern</h2>
            <h3>Radar Softech</h3>
            <div class="links">
                <div class="link">
                    <div class="icon"></div>
                    <div class="link-content"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>