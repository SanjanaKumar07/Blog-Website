function deleteBlog(){
    var form=document.getElementById("delete");
    var button=document.getElementById("deleteButton");
    var r=confirm("Post will be deleted");
    
    if(r==true){
     form.action="profile.php"
    }

    else{
      form.action="javascript:void(0);";
    }

     }

  function logoutProfile(){
    var form=document.getElementById("logout");
    localStorage.removeItem("name_login");
    localStorage.removeItem("email_login");
    localStorage.removeItem("password_login");
    form.action="login.php";

  }
