

<?php
    session_start();
 
         if(!isset($_SESSION['LikedPost'])){
             $_SESSION['LikedPost']=array();
             
         }
    
		  $user="root";
		  $password="";
		  $db="varun";
		  
		  $conn= new mysqli('localhost',$user,$password,$db) or die("Unable to connect");

          $id=$_GET["view"];
          $test="1";

         
		  $sql= "SELECT * FROM blogs WHERE ID=$id;";
          $result= mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
 
		 
		  if($resultCheck>0){
			while($row=mysqli_fetch_assoc($result)){
			
			
			$title=$row["Title"];
			$description=$row["Description"];
			$content=$row["Content"];
			$category=$row["Category"];
            $author=$row["Author"];
            $image=$row["Image"];
            $likes=$row["Likes"];
            

			
			
			
            }


            

            
                
            
        }

        if(isset($_POST['likes'])){
            if(in_array($id,$_SESSION['LikedPost'])){
                $sql1="UPDATE blogs SET Likes=Likes-1 WHERE ID=$id;";
                $likes--;
                $key=array_search($id,$_SESSION['LikedPost']);
                unset($_SESSION['LikedPost'][$key]);
            }
            else{
            array_push($_SESSION['LikedPost'],$id);
            $sql1="UPDATE blogs SET Likes=Likes+1 WHERE ID=$id;";
            $likes++;
            
            }
            
            $result= mysqli_query($conn,$sql1);
            
           
        
        }

        
        
		?>

<script>
function checkLogIn(){
  var form=document.getElementById("likeForm");
  if(localStorage.getItem("email_login")==null){
    alert("Please login to interact with the blog");
    form.action="login.php";
  }

  else if(localStorage.getItem("email")==null){
    window.location.replace("signup.php");
  }

}
  
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="blog.css">
    <link rel="stylesheet" type="text/css" href="blog.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
            <button type="submit"  class="btn btn-dark list-group-item list-group-item-action tcol navbg user"><i class="fa fa-home icon_col"></i> Home</button>
        </form>                          
        </div>

         <div class="sidebar-dropdown">
            
            <form action="profile.php">
              <li type="none"><i class="fa fa-user icon_col"></i><button type="submit" class="btn btn-link user tcol navbg" name="profile">Your Profile</button> </li>
            </form>
            <a href="#" class="list-group-item list-group-item-action tcol navbg"><i class="fa fa-th-list icon_col"></i> Categoriesn</a>
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
        <div class="container-center">
            <div class="blog-element">
                <br>
                <h1><?php echo $title; ?></h1>
            </div>
            <div class="blog-element">
             <form action="profile2.php" method="GET">   
            <button type="submit" class="btn btn-link" value="<?php echo $author?>" name="authorName"><i>By <?php echo $author?></i></button>
            </form>
            </div>
            <div class="blog-element">
                <br>
                <?php echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode($image).'"/>';?>
            </div>
            <div class="blog-element">
                <br>
                <?php echo $content;?>
            </div>
           
            </div>
             <div class="blog-element">
                <br>
                <div class="row mb-5">
                <div class="col-lg-6 col-md-6 col-12 move">
                <a href="#" class="like"><i class="fa fa-heart"></i></a><label id="newlike"> <?php echo $likes;?> Likes</label>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                <form id="likeForm" method="POST">
                <?php
                 if(in_array($id,$_SESSION['LikedPost'])){
                    echo '<button type="submit" class="btn btn-outline-primary" name="likes" id="likes" onclick="checkLogIn()" value="<?php echo $likes; ?>"> Dislike  <i class="fa fa-thumbs-down"></i></button>';
                 }

                 else{
                    echo '<button type="submit" class="btn btn-outline-primary" name="likes" id="likes" onclick="checkLogIn()" value="<?php echo $likes; ?>"> Like  <i class="fa fa-thumbs-up"></i></button>';
                 }
                 ?>
                
                </form>
                </div>
                </div>
            <br>
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