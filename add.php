<?php
include 'connection.php';

if(isset($_POST['sup_name']))
{
$sup_name=$_POST['sup_name'];
$sup_email=$_POST['sup_email'];
$sup_AC=$_POST['sup_AC'];
$sup_payment=$_POST['sup_payment'];
$sup_address=$_POST['sup_address'];
$sup_status=$_POST['sup_status'];
$sup_contact=$_POST['sup_contact'];

 $sql="insert into tbl_supplier (sup_name,sup_address,sup_email,sup_AC,sup_payment,sup_contact,sup_status) values ('$sup_name','$sup_address','$sup_email','$sup_AC','$sup_payment','$sup_contact','$sup_status')";

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


if(isset($_POST['submits']))
{
$sup_id=$_POST['sup_id'];
$sup_name=$_POST['sup_name'];
$sup_email=$_POST['sup_email'];
$sup_AC=$_POST['sup_AC'];
$sup_payment=$_POST['sup_payment'];
$sup_address=$_POST['sup_address'];
$sup_status=$_POST['sup_status'];
$sup_contact=$_POST['sup_contact'];

echo $sup_id;

 $sql="update tbl_supplier set sup_name='$sup_name', sup_email='$sup_email', sup_AC='$sup_AC', sup_payment='$sup_payment', sup_address='$sup_address', sup_status='$sup_status', sup_contact='$sup_contact'  where sup_id='$sup_id'";
$ex=$conn->query($sql);
  if($ex)
  {
          header("Location:DisplayS.php");
    }
 else {
echo "  <div class='alert alert-danger'>
     <strong>Danger!</strong>Data not inserted.".$conn->error."
   </div>";
}
}

















?>
