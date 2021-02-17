<?php 

      require 'config.php';
      $delet_page_style = 'style/delet-page.css';
      include 'header.php';
      session_start();
	  if (isset($_POST['delet_id'])){
	  $_SESSION['id']= null;
	  $_SESSION['id'] = $_POST['delet_id'];
	  echo '
	  <form class="modal-content" action="" method="POST" style="width:40%">
	  <div class="container">
	  <h1>Delete a record</h1>
	  <p>Are you sure you want to delete this record?</p> 
	  <div class="clearfix">
	  <button type="button" class="cancelbtn">Cancel</button>
	  <button type="submit" name="dlt-btn" class="deletebtn">Delete</button>
	  </div>
	  </div>
	  </form>
      ';}
	   
   

	if (isset($_POST['dlt-btn'])) {
	
	$id=$_SESSION['id'] ;
	// sql to delete a record
	$sql = "DELETE FROM books WHERE book_id='".$id."'";
	if ($conn->query($sql) === TRUE) {
	echo '

	<div class="container ">
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Success!</strong> A record has been deleted successfully.
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	</div>
	';
	} else {
	echo "Error deleting record: " . $conn->error;
	}
	$conn->close();
	}
	?>
	 <?php 
include 'footer.php';
?>
