<?php
require_once('connection.php');

$pro_id= $_GET['id'];
$delete="DELETE FROM tbl_product WHERE pro_id='$pro_id'";
$exe=mysqli_query($conn , $delete);
?>

<?php

header("refresh:1; url=DisplayP.php");

?>