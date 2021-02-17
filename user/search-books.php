<?php 
$page='home';
include 'config.php';
include 'header.php';

?>
<img src="styles/image-background.jpg" class="background">
<div class="clearfix"></div>
<div class="main-titling">

<span class="main-heading">read</span>
<span class="main-heading">more</span>
<span class="main-heading">books</span>
</div>
<form  class="search-bar-container"  action="books-search.php" method="GET">
<input type="text" name="search" placeholder="Search..">
<button type="submit"> Search</button>
</form>

