<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Manager</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .wrapper {
            height : 400px;
            width : 400px;
            border-radius: 5px;
            box-shadow : 2px 2px 10px 5px pink;
            padding : 15px;
            display : flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin : auto;
        }

        .sign{
            min-height : 300px;
            width : 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin : 10px auto;
            position : absolute;
            font-size : 15px;
            transition: all 0.5s linear;
        }

        .sign input{
            padding : 10px;
            width : 100%;
            margin : 20px 0;
            border : none;
            box-shadow : 0 0 5px 3px pink;
            border-radius: 5px;
            
        }

        .sign button{
            padding : 10px 50px;
            margin : 20px;
            border : none;
            background : linear-gradient(rgb(211, 80, 80) 0.2%, rgb(190, 132, 132) 70%, rgb(211, 80, 80) 100%);
            border-radius: 10px;
            font-family : "RocknRollOne-Regular";
            color : white;
            cursor : pointer;
        }

        .sign button:hover{
            background : linear-gradient(rgb(133, 8, 8) 0.2%, rgba(240, 105, 105, 0.829) 70%, rgb(133, 8, 8) 100%);
        }

        .sign p{
            font-weight: 600;
            color : rgb(173, 45, 66);
        }

        .sign p span{
            font-weight: bolder;
            color : blue;
            cursor : pointer;
        }

        #signin{
            transform: translateX(250px);
            opacity : 0;
        }

    </style>
</head>
<body>
    <h1>Card Manager</h1>
    <div class="wrapper">
            <form name="signup" id="signup" class="sign" action="signup.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Email Id*" required/>
                <input type="password" name="password" id="password" placeholder="Password*" required/>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password*" required/>
                <button id="signupbtn" name="signupbtn">SignUp</button>
                <p>If you are an existing User ? <span id="signincall" class="signcall"><u>SignIn</u></span></p>
            </form>
            <form name="signup" id="signin" class="sign" action="signin.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Email Id*" required/>
                <input type="password" name="password" id="password" placeholder="Password*" required/>
                <button id="signinbtn" name="signinbtn">SignIn</button>
                <p>If you are a new User ? <span id="signupcall" class="signcall"><u>SignUp</u></span></p>
            </form>
    </div>

    <script>
        let signup = document.getElementById("signup");
        let signin = document.getElementById("signin");
        let signincall = document.getElementById("signincall");
        let signupcall = document.getElementById("signupcall");
        
        signupcall.addEventListener("click", ()=>{
        signin.style.opacity = "0";
        signin.style.transform = "translateX(250px)";
        signup.style.opacity = "1";
        signup.style.transform = "translateX(0)";
        });
        
        signincall.addEventListener("click", ()=>{
        signin.style.opacity = "1";
        signin.style.transform = "translateX(0)";
        signup.style.opacity = "0";
        signup.style.transform = "translateX(-250px)";
        });
    </script>
</body>
</html>