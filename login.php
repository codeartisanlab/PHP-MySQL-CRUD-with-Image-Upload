<?php require('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
</head>
<body>
	<div class="row mt-5">
		<div class="col-md-4 offset-4">
			<div class="card">
				<h3 class="card-header">Login</h3>
				<div class="card-body">
					<?php
					if(isset($_POST['submit'])){
						$res=check_login($_POST);
						if($res['bool']==true){
							header("location:index.php");
						}else{
							echo '<p class="text-danger">Invalid Username/Password!!</p>';
						}
					}
					?>
					<form action="" method="post">
						<table class="table table-bordered">
							<tr>
								<th>Username</th>
								<td><input type="text" name="username" class="form-control" /></td>
							</tr>
							<tr>
								<th>Password</th>
								<td><input type="password" name="password" class="form-control" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit" class="btn btn-primary" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>