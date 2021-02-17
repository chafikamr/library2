<?php 
$page='books';
include 'header.php';
require 'config.php';
$sql    = "SELECT * FROM books where book_id='444'";

$result = $conn->query($sql);

?>







<div class="container">
  <div class="clearfix"></div>
  <div class="container py-5">
   
   <?php
 if ($result->num_rows > 0) {
  // output data of each row
      
  while($row = $result->fetch_assoc()) {
     echo '

<div class="row pb-5 mb-4">
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-1">
            <!-- Card-->
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"> <img src="../admin/images/'. $row["book_image"].'" alt="" height class="img-fluid d-block mx-auto mb-3">
                    <h5>' . '<a href="book-details.php?id='.$row['book_id'].'">'.$row["book_title"].'</a>' . '</h5>
                    
                    
                </div>
            </div>
        </div>
     ';
  }
} else {
  echo "0 results";
}
$conn->close();
   ?>
  
</div>
</div>