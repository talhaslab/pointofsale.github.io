

<?php


include 'connection.php';

 if(isset($_POST['sup_name']))
{
$sup_name=$_POST['sup_name'];
$sup_contact=$_POST['sup_contact'];

$sql="INSERT INTO `tbl_user` ( `colUserName`, `colUserPassword`, `colUserRole`, `colUserStatus`, `contact`) VALUES ( '$sup_name', '123', 'Cashier', '1', '$sup_contact')";



$ex=$conn->query($sql);
  if($ex)
  {
    echo "<div class='alert alert-success'>
  <strong>Success!</strong> Data Inserted Successfully
</div>";

  }
 else {
echo "  <div class='alert alert-danger'>
     <strong>Danger!</strong>Data not inserted.".$conn->error."
   </div>";
}
}


?>