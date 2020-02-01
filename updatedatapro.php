<?php
	require_once('connection.php');
	
	$pro_id=$_GET['id'];
	$pro_quantity=$_POST['quantity'];
	
	//UPDATE tableName SET column1='value1', column2='value2' WHERE id='$id';
	$query="UPDATE tbl_product SET pro_quantity='$pro_quantity' WHERE pro_id='$pro_id'";
	
	$exe=mysqli_query($conn, $query);
	
	header("refresh:1, url=DisplayP.php");

?>