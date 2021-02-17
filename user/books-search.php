<?php 
$page='books';
include 'header.php';
require 'config.php';
$search = $_GET['search'];

$sql    = "SELECT * FROM books where book_title LIKE '%".$search."%'";

$result = $conn->query($sql);
$row = mysqli_fetch_array($result)

?>







<div class="container">
  <div class="clearfix"></div>
  <div class="container py-5">
   
   <?php
  
    echo '

<div class="row pb-5 mb-4">
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-1">
            <!-- Card-->
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"> <img src="../admin/images/'. $row[3].'" alt="" height class="img-fluid d-block mx-auto mb-3">
                    <h5>' . '<a href="delete.php?id='.$row['book_id'].'">'.$row["book_title"].'</a>' . '</h5>
                    
                    
                </div>
            </div>
        </div>
     ';


$conn->close();
   ?>
  
</div>
</div>