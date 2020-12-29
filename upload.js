
function validate(){
    var content= document.getElementById("content").value;
    var title= document.getElementById("title").value;
    var author= document.getElementById("author").value;
    var category= document.getElementById("category").value;
    var image= document.getElementById("picture").value;
    var types=["jpeg","jpg","png","jfif","JPEG","JPG","PNG","JFIF"];
    var extension=image.split(".");



    console.log(image);
    

    if(title.trim().length==0){
        alert("Please enter Title of your blog ");
    
    }

    else if(content.trim().length==0){
        alert("Please enter Content of your blog");
    }

    else if(author.trim().length==0){
        alert("Please enter your name or write Anonymous");
    }

    else if(category.length==0){
        alert("Please select a category");
    
    }

    else if(!types.includes(extension[1])){
        alert("Insert appropriate file type as image");
    }

    else{
        alert("Upload successfull");
    }

   
}




function updateValidation(){

    var content= document.getElementById("content").value;
    var title= document.getElementById("title").value;
    var author= document.getElementById("author").value;
    var category= document.getElementById("category").value;
    var form= document.getElementById("updateForm");
    



        

    if(title.trim().length==0){
        alert("Please enter Title of your blog ");
    
    }

    else if(content.trim().length==0){
        alert("Please enter Content of your blog");
    }

    else if(author.trim().length==0){
        alert("Please enter your name or write Anonymous");
    }

    else if(category.length==0){
        alert("Please select a category");
    
    }

    
    else{
        alert("Update successfull");
        
    }

}
