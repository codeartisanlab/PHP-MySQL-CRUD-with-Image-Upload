<?php require('functions.php'); ?>
<?php
$id=$_GET['id'];
$image=$_GET['image'];
$res=delete_data($id,$image);
if($res['bool']==true){
	header("location:index.php");
}
?>