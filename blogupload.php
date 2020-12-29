<script>
  if(localStorage.getItem("email_login")==null){
    window.location.replace("login.php");
  }

  else if(localStorage.getItem("email")==null){
    window.location.replace("signup.php");
  }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="upload.css">
    <link rel="stylesheet" type="text/css" href="blog.css">
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

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="main-form" method="POST" enctype="multipart/form-data">
<div class="container">
       
            <div class="form-group">
               <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            <div class="invalid-feedback">please enter a valid username</div>
            </div>
           <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea name="content" style = "width:100%;" class="form-control" id="content" rows="15"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="food">Food</option>
                    <option value="tech">Science and Technology</option>
                    <option value="motivational">Motivational</option>
                    <option value="science">Science Literature</option>
                    <option value="stories">Stories</option>
                    
                    <option value="travel">Travel</option>
                    <option value="mythology">Mythology</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <label for="author">Author Name</label>
                    <input type="text" name="author" id="author" class="form-control" value="<?php echo $_COOKIE['fullName']?>" required>
                </div>
                <div class="col">
                    <label for="picture">Image</label>
                    <input type="file" name="picture" id="picture" class="form-control" >
                </div>
                </div>
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-primary"  onclick="validate()" name="insert">Submit</button>
            </center>

        </div>
        </form>
        

    </div>

</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>
<script src="upload.js"></script>
<?php
$username="root";
 $password="";
 $db="varun";
 date_default_timezone_set('Asia/Kolkata');

 

 if(isset($_POST["insert"])){
    $conn= new mysqli('localhost',$username,$password,$db) or die("Unable to connect");
       
    $title=mysqli_real_escape_string($conn,$_POST["title"]);
    $content=mysqli_real_escape_string($conn,$_POST["content"]);
    $description=mysqli_real_escape_string($conn,$_POST["description"]);
    $category=$_POST["category"];
    $author=mysqli_real_escape_string($conn,$_POST["author"]);
    $image=$_FILES["picture"]["type"];
    $date=date("d/m/Y");
    $time=date("h:m:sa");

   
    

    



    if(strlen(trim($title))==0 || strlen(trim($content))==0 || strlen(trim($category))==0 || strlen(trim($author))==0|| ImageExtension($image)){
        $title="";
        $content="";
        $category="";
        $author="";
        $image="";

       
    }

    else{
        
            $picture=$_FILES["picture"]["tmp_name"];
            $file= addslashes(file_get_contents($picture));
            $sql ="INSERT INTO blogs (Title,Content,Description,Category,Author,Image,Likes,Date,Time) VALUES ('$title','$content','$description','$category','$author','$file',0,'$date','$time');";
            mysqli_query($conn,$sql);

           
           
        
        }
        
      
 }

 function ImageExtension($image){
    $extension= explode("/",$image,2);
    $type= array("jpg","jpeg","png","jfif","JPG","JPEG","PNG","JFIF");


    
    if(in_array($extension[1],$type)){
        return false;
    }

    
    else{
        return true;
    }

}

 

?>


</body>
</html>