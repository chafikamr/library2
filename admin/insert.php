<?php 
$page_add_book_style = 'add-book-css';
require 'config.php';
include 'header.php';






session_start();
   if (!isset($_SESSION['url'])) {
     $_SESSION['url']=null;
   }
if(isset($_POST['submit'])) {
    print_r($_POST);
    
    
    
   
    $title        = $_POST['title'];
    $author       = $_POST['author'];
    $image        = $_FILES["image"]["name"]; 
    $prix         = $_POST['prix'];
    $quantity     = $_POST['quantity'];
    $buy_date     = $_POST['buy_date'];
    $publish_date = $_POST['publish_date'];
    $target       = "images/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $sql = "
    INSERT INTO books (
    book_title,
    book_author,
    book_image,
    book_prix,
    book_quantity,
    book_buy_date,
    book_publish_date)
    VALUES 
    ('".$title ."',
    '".$author ."',
    '".$image ."',
    '".$prix."',
    '".$quantity."',
    '".$buy_date."',
    '".$publish_date."');";
   
    if ($conn->query($sql) === TRUE) {
      $_SESSION['url']= "true";
      header("Location: insert.php");
     exit();
       }else{
       echo "Error: " . $sql . "<br>" . $conn->error;
       }
       





}


?>

  <div class="sub-header-container">
  <div class="container">
  <span class="sub-header">Add a new book :</span>
  </div>
  </div>
  <?php  if($_SESSION['url']=="true"){
  echo '
  <div class="container ">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> A new record has been added successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  </div>
    ';
   $_SESSION['url']="";

} ?>
<div class="login_wrap">
<form action="insert.php" method="POST"  enctype="multipart/form-data">
            <label>Title</label>
     		<input type="text" placeholder="Title" id="userName" name="title">
            <label>Author</label>
     		<input type="text" placeholder="Title" id="userName" name="author">
            <label>Image</label>
            <div class="custom-file-wrp">	
			<div class="custom-file">
			<label for="fileupload">Upload</label>
			<input type="file" id="fileupload" name="image">
			</div>
			<span  class="filename"></span>		
			</div>
            <label>prix</label>
       		<input type="text" id="userName" name="prix">
            <label>quantity</label>
       		<input type="text"  id="userName" name="quantity">
            <label>dat d'achat</label>
         	<input type="text"  id="userName" name="buy_date">
            <label>date of publication</label>
       		<input type="text"  id="userName" name="publish_date">
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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <?php 
include 'footer.php';
?>
