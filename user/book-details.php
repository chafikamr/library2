<?php 

include 'header.php';
require 'config.php';
$id = $_GET['id'];
$sql    = "SELECT * FROM books where book_id=".$id."";
$result = mysqli_query($conn,$sql);



$row= mysqli_fetch_array($result);

?>


<div class="container  " style="height: 100px;">
</div>
<div class="container ">
	<div class="row">
  <div class="col-sm-6" style="background-color: grey; padding: 20px;">
  	<div><span class="book-datail">Name :</span class="book-info-det"><span><?php echo $row['book_title']; ?></span></div>
  	<div><span class="book-datail">Author :</span  class="book-info-det"><span><?php echo $row['book_author']; ?></span></div>
  	<div><span class="book-datail">Prix :</span   class="book-info-det"><span><?php echo $row['book_prix']; ?></span></div>
  	<div><span class="book-datail">Quantity Au Stock :</span   class="book-info-det"><span><?php echo $row['book_quantity']; ?></span></div>
  	<div><span class="book-datail">Date Of Publication :</span class="book-info-det"><span><?php echo $row['book_publish_date']; ?></span></div>





  </div>
  <div class="col-sm-4" style="text-align: center;">
  	
<img style="width:200px; height: auto;" src=<?php echo "../admin/images/".$row['book_image'].""; ?>>
  </div>
</div>
</div>