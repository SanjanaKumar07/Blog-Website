<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script type="text/javascript" src="jQuery-3.5.1.min.js"></script>
  
  
</head>

<body>

<script>
  function checking(){
    console.log("In validate");
    var fname=document.getElementById("First name").value;
    var lname=document.getElementById("Last name").value;
    var email=document.getElementById("Email").value;
    var password=document.getElementById("password").value;
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var form=document.getElementById("signUp");

    localStorage.fullname=fname;
    localStorage.email=email;
    localStorage.password=password;

    


    

   

    

    
}
</script>



<div class="container">

<div class="jumbotron m-5">
    <h1 class="text-center"> SIGN UP</h1>
    <hr class="w-25 pt-4">

  <form method="POST" enctype="multipart/form-data" id="signUp">
  <div class="row">
    <div class="col">
      <label for="exampleInputEmail1">Full Name</label>
      <input type="text" class="form-control" placeholder="First name" name="firstName" id="First name">
    </div>
    <div class="col">
      <label for="exampleInputEmail1">Age</label>
      <input type="text" class="form-control" placeholder="Last name" name="lastName" id="Last name">
    </div>
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  aria-describedby="emailHelp" name="Email" id="Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  name="password" id="password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <div class="text-center">
  
  </form>
  </div>
</div>
</div>

<button type="button" class="btn btn-dark text-center" onclick="checking()" name="insert">Submit</button>
    

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  


  
  
 
</body>

</html>