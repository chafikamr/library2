<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles/header.css?version=51">
  <link rel="stylesheet" type="text/css" href="styles/search-page.css?version=51">
  <?php if(isset($page_add_book_style))echo '<link rel="stylesheet" type="text/css" href="styles/add-book.css?version=51">'?>
   <?php if(isset($delet_page_style))echo '<link rel="stylesheet" type="text/css" href="styles/delet-page.css?version=51">'?>
    <?php if(isset($delet_page_style))echo '<link rel="stylesheet" type="text/css" href="styles/contact.css?version=51">'?>

  
	<title><?php if(isset($page))echo $page; ?></title>
</head>
<body>
  	 <!--Start The Header-->
  <header>
    	<div class="container">
    	<nav>
    		<h1>Library</h1>
    		<ul>
    			<li  <?php if(isset($page)&& $page==='home')echo 'class="active"'; ?>><a href="search-books.php"  style="color: white ; text-decoration: none;" >Home</a></li>
    			<li <?php if(isset($page)&& $page==='books')echo 'class="active"'; ?>><a href="books.php"  style="color: white ; text-decoration: none;" >Books</a></li>
          <li <?php if(isset($page)&& $page==='contact')echo 'class="active"'; ?>><a href="contact.php"  style="color: white ; text-decoration: none;" >Contact</a></li>
    		</ul>
    	</nav>
    </div>
  </header>