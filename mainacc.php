


<?php

$connect = mysqli_connect("localhost", "root", "", "myfyp");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "SELECT * FROM `tbl_supplier` WHERE sup_name LIKE '%$request%'";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["sup_name"];
 }
 echo json_encode($data);
}

?>

























