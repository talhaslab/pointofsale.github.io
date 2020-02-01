<?php
	require_once('connection.php');
	
	$id=$_GET['id'];
	$cou_payment=$_POST['cou_payment'];
	
	//UPDATE tableName SET column1='value1', column2='value2' WHERE id='$id';
	$query="UPDATE tbl_coustmer SET cou_payment='$cou_payment' WHERE id='$id'";
	
	$exe=mysqli_query($conn, $query);
	
	header("refresh:1, url=Displayco.php");

?>