<?php 
$page = 'books';
require 'config.php';
include 'header.php';

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

?>
<div class="sub-header-container">
   <div class="container">
   	 <span class="sub-header">list of books :</span>
   	 <a href="insert.php" style="float: right;" ><button class="btn-major" >Add</button></a>
   </div>
</div>
<div class="container">
<table class="books-table">
	<tr>
		<th>Nom</th>
		<th>author</th>
		<th>Image</th>
		<th>Prix,</th>
		<th>quatité au stock</th>
		<th>date d'achat</th>
		<th>date de publication</th>
		<th>Action</th>
	</tr>
    <?php
    if ($result->num_rows > 0) {
  // output data of each row
    	
  while($row = $result->fetch_assoc()) {
     echo '
         <tr>
		<td>'. $row["book_title"].'</td>
		<td>'. $row["book_author"].'</td>
		<td> <img src="images/'. $row["book_image"].'" style="width:50px; height:50px;"></td>
		<td>'. $row["book_prix"].'</td>
		<td>'. $row["book_quantity"].'</td>
		<td>'. $row["book_buy_date"].'</td>
		<td>'. $row["book_publish_date"].'</td>
		<td><form action="update.php" method="POST" style="display:inline;"><button class="btn btn-warning 
		type="submit" name="update_id" value="'. $row["book_id"].'" >Update</button></form>
		<form action="delet.php" method="POST" style="display:inline;">
		<button  class="btn btn-danger" value="'. $row["book_id"].'" name="delet_id">Delet</button>
		</form></td></tr>

     ';
  }
} else {
  echo "0 results";
}
$conn->close();
   ?>
</table>
</div>
 <?php 
include 'footer.php';
?>
