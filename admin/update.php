<?php 
    $page_add_book_style = 'add-book-css';
    require 'config.php';
    include 'header.php';
    session_start();
    if(!isset($_SESSION['id_of_book'])){$_SESSION['id_of_book']=$_POST['update_id'];};
  
    // $id           = $_POST['update_id'] ;
    // $_SESSION['id_of_book']=$id;
    // if (isset($_POST['update_id'])) {
    // 	$id= $_POST['update_id'];
    // }else{   
    // }
// GET THE OLD DATA FROM DATABASE 
    $id           = $_SESSION['id_of_book'] ;
    $sql          = "SELECT * FROM books WHERE book_id=".$id ."";
    $result       = $conn->query($sql); 
    $row          = $result->fetch_assoc();
   
  
// ASSIGN THE SELECTED DATA TO VARIABLES 

    $title        = $row["book_title"];
    $author       = $row["book_author"];
    $img          = $row["book_image"]; 
    $prix         = $row["book_prix"];
    $quantity     = $row["book_quantity"];
    $buy_date     = $row["book_buy_date"];
    $publish_date = $row["book_publish_date"];
    
    
// UPLOAD THE NEW DATA TO DATABASE
   
  
    if(isset($_POST['submit'])){

    
     
    $title        = $_POST['title'];
    $author       = $_POST['author'];
    $image        = $_FILES["image"]["name"]; 
    $prix         = $_POST['prix'];
    $quantity     = $_POST['quantity'];
    $buy_date     = $_POST['buy_date'];
    $publish_date = $_POST['publish_date'];

// CHECK IF THE IMAGE HAS BEEN CHANGED OR NOT 


    if(!isset($_FILES["image"]["name"]) || $_FILES["image"]["name"]=="" ){//if the image is not set
    $current_img  = $img; // the image is the old 
    }elseif(isset($_FILES["image"]["name"])){  // if the image is set 
    $current_img  = $_FILES["image"]["name"];};// the img is new
    $target       = "images/".basename($current_img);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    
// SQL UPDATE SCRIPT 	


    $sql=" UPDATE books SET 
    book_title='".$title."',
    book_author='".$author."',
    book_image='".$current_img."',
    book_prix='".$prix."',
    book_quantity='".$quantity."' ,
    book_buy_date='".$buy_date."',
    book_publish_date='".$publish_date."'
    WHERE book_id='".$id."'" ; 


//SEND THE SCRIPT TO THE DATABSE 
   if ($conn->query($sql)===TRUE){
   echo "Record updated successfully";}else{
   echo "Error ypdating record: " . $conn->error;}
   
//END SUBMITTING PROCESS 
   unset($_SESSION['id_of_book']);
   }?>
<div class="login_wrap">
	<form action="update.php" method="POST"  enctype="multipart/form-data">
	            <label>Title</label>
	     		<input type="text" placeholder="Title" id="userName" name="title" <?php if(isset($title))echo 'value="'.$title.'"' ;?>>
	            <label>Author</label>
	     		<input type="text" placeholder="Title" id="userName" name="author" <?php if(isset($$author))echo 'value="'.$author.'"' ;?>>
	            <label>Image</label>
	            <div class="custom-file-wrp">	
				<div class="custom-file">
				<label for="fileupload">Upload</label>
				<input type="file" id="fileupload" name="image" <?php if(isset($image))echo 'value="'.$img.'"' ;?>>
				</div>
				<span  class="filename"></span>		
				</div>
	            <label>prix</label>
	       		<input type="text" id="userName" name="prix" <?php if(isset($prix))echo 'value="'.$prix.'"' ;?>>
	            <label>quantity</label>
	       		<input type="text"  id="userName" name="quantity" <?php if(isset($quantity))echo 'value="'. $quantity.'"' ;?>>
	            <label>dat d'achat</label>
	         	<input type="text"  id="userName" name="buy_date" <?php if(isset($buy_date))echo 'value="'.$buy_date.'"' ;?>>
	            <label>date of publication</label>
	       		<input type="text"  id="userName" name="publish_date" <?php if(isset($publish_date))echo 'value="'.$publish_date.'"' ;?>>
	      		<input type="submit" name="submit" class="bgblue btn-add-bk" >
	</form>
 </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="crossorigin="anonymous"></script>
<script>
	//now will select file name and print in div tag.
	//for this you need to pass parameter
	//will check in console first.
	// you have to go in target than file property
	$(function()
	{
	$("#fileupload").change(function(event) {
	var x = event.target.files[0].name
	$(".filename").text(x)
	});
	})
</script>
 <?php 
include 'footer.php';
?>
