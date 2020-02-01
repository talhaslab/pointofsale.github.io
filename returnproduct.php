<?php

include 'accees.php';



if(isset($_GET['id']))
{

	echo $_GET['id'];

	$at = new item;

 $x=$at->returnproduct($_GET['id']);
  if($x)
  {
 
echo "<script>window.location = 'seesale.php'</script>";
   }
}







 ?>