<?php require('header.php'); ?>
<div class="container mt-4">
	<div class="card">
		<h3 class="card-header">All Data</h3>
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Title</th>
						<th>Image</th>
						<th>Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$data=all_data();
					if($data['bool']==true){
						foreach($data['data'] as $row){
					?>
					<tr>
						<td><?php echo $row['title']; ?></td>
						<td><img src="imgs/<?php echo $row['image']; ?>" width="100" /></td>
						<td><?php echo $row['created_at']; ?></td>
						<td>
							<a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">Edit</a>
							<a onclick="return confirm('Are you sure you want to delete this?');" href="delete.php?id=<?php echo $row['id']; ?>&&image=<?php echo $row['image']; ?>" class="btn btn-sm btn-danger">Delete</a>
						</td>
					</tr>
					<?php }} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php require('footer.php'); ?>