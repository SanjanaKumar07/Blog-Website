
<?php

if(!isset($_COOKIE["email"]) ||!isset($_COOKIE["fullName"]) ){
  setcookie("email",$_POST['Email'],time()+3600*24*30);
  setcookie("fullName",$_POST['firstName'],time()+3600*24*30);

}


session_start();
if(!isset($_SESSION['sort'])){
  $_SESSION['sort']="";
}

$username="root";
$password="";
$db="varun";
$conn= new mysqli('localhost',$username,$password,$db) or die("Unable to connect");


      

    if(isset($_POST['insert'])){
      $firstName=$_POST['firstName'];
      $lastName=$_POST['lastName'];
      $email=$_POST['Email'];
      $userpassword=$_POST['password'];
      
      if(strlen(trim($firstName))==0 || strlen(trim($lastName))==0||!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen(trim($userpassword))<8){
        $firstName="";
        $lastName="";
        $email="";
        $userpassword="";
       
       
      }

      else{
        
        $hashedPassword=hash('sha256',$userpassword);
        $sql="INSERT INTO users(FName,Age,email,password) VALUES ('$firstName','$lastName','$email','$hashedPassword');";
        mysqli_query($conn,$sql);
      }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>preview</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="preview.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">


    <title>NavBar</title>
</head>
<body>
  <div class="d-flex" id="wrapper">

    <div class="bg-light border-right navbg" id="sidebar-wrapper">
        <div>
            <a href="#" class="navbar-brand space">Bloggit</a>
        </div> 
        <div class="list-group list-group-flush ">
        <form action="preview.php">
            <button type="submit"  class="btn btn-link user tcol navbg"><i class="fa fa-home icon_col"></i> Home</button>
        </form>                          
        </div>

         <div class="sidebar-dropdown">
            
            <form action="profile.php">
              <li type="none"><button type="submit" class="btn btn-link user tcol navbg" name="profile"><i class="fa fa-user icon_col"></i>Your Profile</button> </li>
            </form>
            <a href="#" class="list-group-item list-group-item-action tcol navbg"><i class="fa fa-th-list icon_col"></i> Categories</a>
            <div class="sidebar-submenu">
            <form action="preview.php" method="GET">
              <ul>
                <li type="none"><button type="submit" class="btn btn-link categories_col" value="food" name="category">Food</button> </li>
                <li type="none"><button type="submit" class="btn btn-link categories_col" value="tech" name="category">Technology</button></li>
                <li type="none"><button type="submit" class="btn btn-link categories_col" value="motivational" name="category">Motivational</button></li>
            
                <li type="none"><button type="submit" class="btn btn-link categories_col" name="category" value="science">Science Literature</button></li>
                    <li type="none"><button type="submit" class="btn btn-link categories_col" name="category" value="travel">Travel</button></li>
                    
                    <li type="none"><button type="submit" class="btn btn-link categories_col" name="category" value="stories">Stories</button></li>
                
                    <li type="none"><button type="submit" class="btn btn-link categories_col" name="category" value="mythology">Mythology</button></li>
                  

              </ul>
            </form>
              
            </div>
          </div>

        <div class="sidebar-dropdown">
            <a href="#" class="list-group-item list-group-item-action tcol navbg"><i class="fa fa-sort icon_col"></i> Sort</a>
            <div class="sidebar-submenu gs">
              <ul>
                <li type="none"><a href="#" class="categories_col">By Likes</a> </li>
                <li type="none"><a href="#" class="categories_col">By Time</a></li>
              </ul>
            </div>
          </div>
          <div class="copyrights">
            <p class=>Copyrights © 2020 </p>
          
          </div>
          
        </div>

    <div id="page-content-wrapper">

        <nav class="navbar navbar-fixed-top navbar-expand navbar-light bg-light border-bottom ">
            <button class="btn btn-primary button_rotate" id="menu-toggle"><span class="dark-blue-text"><i
        class="fa fa-bars fa-1x icon_rotate"></i></span>
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            

            <div class="collapse navbar-collapse">
                <ul class = "navbar-nav ml-auto">
                    <li class="nav-item">
                        <form action="blogupload.php">
                        <button type="submit" class="btn btn-primary butt">Create your own <i class="fa fa-plus-square"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <br>       
  
        <div class="container">
          <div class="card-columns">
          <?php

$user="root";
$password="";
$db="varun";

$conn= new mysqli('localhost',$user,$password,$db) or die("Unable to connect");






if(isset($_GET["category"])){
  $category=$_GET["category"];
  $_SESSION["category"]=$category;

  if($category=="home"){
    if($_SESSION['sort']=="likes")
    {
      $sql="SELECT * FROM blogs ORDER BY Likes DESC ;";
    }
    else{
      $sql="SELECT * FROM blogs ORDER BY ID DESC ;";
    }
    
  }

  else{
  
  

  if($_SESSION['sort']=="likes"){
    $sql="SELECT * FROM blogs WHERE Category='$category' ORDER BY Likes DESC ;";

  }

  else if($_SESSION['sort']=="time"){
    $sql="SELECT * FROM blogs WHERE Category='$category' ORDER BY ID DESC ;";
  

  }

  else {
    $sql="SELECT * FROM blogs WHERE Category='$category' ORDER BY ID DESC ;";
  

  }
}
  
}

else if(isset($_POST['likes'])){
  $_SESSION['sort']="likes";
  

  if(isset($_SESSION["category"])){
    $category=$_SESSION["category"];
  
    if($category=="home"){
      $sql="SELECT * FROM blogs ORDER BY Likes DESC ;";
    }
    else{
    $sql="SELECT * FROM blogs WHERE Category='$category' ORDER BY Likes DESC ;";
  }
}

  else{
    $sql="SELECT * FROM blogs ORDER BY Likes DESC ;";
  
  }
}

else if(isset($_POST['time'])){
  $_SESSION['sort']="time";
  
  if(isset($_SESSION["category"])){
    $category=$_SESSION["category"];

    if($category=="home"){
      $sql="SELECT * FROM blogs ORDER BY ID DESC;";
    }
    else{
      $sql="SELECT * FROM blogs WHERE Category='$category' ORDER BY ID DESC ;";
    }
    
  }

  else{
    $sql="SELECT * FROM blogs ORDER BY ID DESC ;";
  
  }

}

else{
  $sql="SELECT * FROM blogs ORDER BY ID DESC ;";
  
}









$result= mysqli_query($conn,$sql);
  $resultCheck = mysqli_num_rows($result);

  

  if($resultCheck>0){
    while($row=mysqli_fetch_assoc($result)){

    
    
    $titleval=$row["Title"];
    $contentval=$row["Description"];
   
    $imageval=$row['Image'];
    $authorval=$row["Author"];
    $id=$row['ID'];
    $likes=$row['Likes'];

    

    echo '<div class="card">
    <img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($imageval).'">
    <div class="card-body">
      <h5 class="card-title">'.$titleval.'</h5>
      <form action="blog.php" method="GET">
      <button type="submit" class="button" name="view" value='.$id.'><i class="fa fa-paper-plane fa_btn"></i></button>
    </div>
  </div>';
  

    

    
    
    }

    
              
          
      }
      
      if(isset($_GET["view"])){
        $val=$_GET["view"];
       
 
        

      }

      
      
    
?>
              
          </div>
  
          
  
            
            
      </div>
  </body>
  </html>
  
  
  







    </div>
  </div>
</div>




    </div>

</div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
 
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>

</body>
</html>