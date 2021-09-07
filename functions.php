<?php

session_start();

function _t($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

// Db Connectivity
$conn=mysqli_connect("localhost","root","","core_todolist");

// Check Login
function check_login($data){
	$res=array();
	$user=$data['username'];
	$pwd=$data['password'];
	if($user=='admin' && $pwd=='123456'){
		$res['bool']=true;
		$_SESSION['loginStatus']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// All Data
function all_data(){
	global $conn;
	$res=array();
	$sql="SELECT * FROM items ORDER BY id DESC";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($result)){
			$res['data'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Add Data
function add_data($data,$image){
	global $conn;
	$res=array();
	$title=$data['title'];
	$detail=$data['detail'];
	$sql="INSERT INTO items (title,detail,image) VALUES ('$title','$detail','$image')";
	$result=mysqli_query($conn,$sql);
	if($result){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Fetch single data
function get_data($id){
	global $conn;
	$res=array();
	$sql="SELECT * FROM items WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		$res['bool']=true;
		$res['data']=mysqli_fetch_assoc($result);
	}else{
		$res['bool']=false;
	}
	return $res;
}


// Update Data
function update_data($data,$image,$id){
	global $conn;
	$res=array();
	$title=$data['title'];
	$detail=$data['detail'];
	if($image==''){
		$sql="UPDATE items SET title='$title',detail='$detail' WHERE id='$id'";
	}else{
		$sql="UPDATE items SET title='$title',detail='$detail',image='$image' WHERE id='$id'";
	}
	$result=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Delete Data
function delete_data($id,$img_name){
	global $conn;
	$res=array();
	$sql="DELETE FROM items WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0){
		$res['bool']=true;
		unlink('imgs/'.$img_name);
	}else{
		$res['bool']=false;
	}
	return $res;
}

?>