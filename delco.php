<?php
require_once('connection.php');

$id= $_GET['id'];
$delete="DELETE FROM tbl_coustmer WHERE id='$id'";
$exe=mysqli_query($conn , $delete);
?>

<?php

header("refresh:1; url=Displayco.php");

?>