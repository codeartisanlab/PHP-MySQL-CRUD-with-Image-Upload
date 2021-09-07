<?php require('header.php'); ?>
	<div class="container mt-4">
		<div class="card">
				<h3 class="card-header">Add Data</h3>
				<div class="card-body">
					<?php
					if(isset($_POST['submit'])){
						$image='';
						if(!empty($_FILES['image']['name'])){
							$temp=$_FILES['image']['tmp_name'];
							$image=$_FILES['image']['name'];
							$image=time().'_'.$image;
							if(move_uploaded_file($temp, 'imgs/'.$image)){
								echo '<p class="text-success">Image has been uploaded.</p>';
							}else{
								echo '<p class="text-danger">Error Uploading Image!!</p>';
							}
						}
						$res=add_data($_POST,$image);
						if($res['bool']==true){
							echo '<p class="text-success">Data has been inserted</p>';
						}else{
							echo '<p class="text-danger">Something Invalid!!</p>';
						}
					}
					?>
					<form action="" method="post" enctype="multipart/form-data">
						<table class="table table-bordered">
							<tr>
								<th>Title</th>
								<td><input type="text" name="title" class="form-control" /></td>
							</tr>
							<tr>
								<th>Detail</th>
								<td><input type="text" name="detail" class="form-control" /></td>
							</tr>
							<tr>
								<th>Image</th>
								<td><input type="file" name="image" class="form-control" /></td>
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
<?php require('footer.php'); ?>