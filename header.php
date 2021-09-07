<?php require('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">TodoList</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
    	<?php
			if(isset($_SESSION['loginStatus'])){
				?>
				<li><a class="nav-link" href="add.php">Add Data</a></li>
				<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
				<?php
			}else{
				header("location:login.php");
			}
		?>
      </ul>
    </div>
  </div>
</nav>