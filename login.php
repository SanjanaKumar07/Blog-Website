<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<script>
    function checkLogIn(){
        
        
        var fullName=document.getElementById("fullName").value;
        var email=document.getElementById("email").value;
        var password=document.getElementById("password").value;
        var form=document.getElementById("loginForm");

        
        

        if(fullName==localStorage.getItem("fullName")||email==localStorage.getItem("email")||password==localStorage.getItem("password")){
            localStorage.name_login=fullName;
            localStorage.email_login=email;
            localStorage.password_login=password;
            form.action="preview.php";
            
        }

        else{
            console.log("Incorrect informtion");
            
        }

    }
    
</script>

<body>




    <form class="box" id="loginForm" method="POST">
        <h1>Login</h1>
        <input type="text" name="fullName" placeholder="Full Name" id="fullName">
        <input type="email" name="email" placeholder="Email" id="email">
        <input type="password" name="password" placeholder="Password" id="password">
        <input type="submit" name="'submit" value="Login" onclick="checkLogIn()">
        <div class="register">
            Not registered yet? <a href="signup.php">Sign Up</a>
        </div>
    </form>



</body>
</html>