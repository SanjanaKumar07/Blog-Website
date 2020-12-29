<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>

<script>
  function checkingform(){
    console.log("In validate");
    var fname=document.getElementById("firstName").value;
    var lname=document.getElementById("lastName").value;
    var email=document.getElementById("Email").value;
    var password=document.getElementById("password").value;
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var form=document.getElementById("signUp");


    

    if(fname.trim().length==0){
        alert("Enter First Name");
    }

    else if(lname.trim().length==0){
        alert("Enter Last name");
    }

    else if(!email.match(mailformat)){
        alert("Enter valid email id");
    }

    else if(password.trim().length<8){
        alert("Password should have minimum 8 characters");
    }

    else{
        alert("SignUp successfull");
        localStorage.fullname=fname;
        localStorage.email=email;
        localStorage.password=password;
        form.action="preview.php";
      
    }

    

    
}
</script>




    <form class="box" id="signUp" method="post">
        <h1>Sign Up!</h1>
        <input type="text" name="firstName" id="firstName" placeholder="Name">
        <input type="number" name="lastName"  id ="lastName" placeholder="Age">
        <input type="email" name="Email" id="Email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="submit" name="insert" value="Sign Up" onclick="checkingform()">
        <div class="login">
            Go back to <a href="login.php">Login</a>
        </div>
    </form>


</body>
</html>