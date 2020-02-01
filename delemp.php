<?php
require_once('connection.php');

$ColUserID= $_GET['id'];
$delete="DELETE FROM tbl_user WHERE ColUserID='$ColUserID'";
$exe=mysqli_query($conn , $delete);
?>

<?php

header("refresh:1; url=displayemp.php");

?>