<?php
 if(isset($_POST['submit']))
 {
$pro_name=$_POST['pro_name'];
$pro_quantity=$_POST['pro_quantity'];
$pro_supplierid=$_POST['pro_supplierid'];
$pro_peritemprice=$_POST['pro_peritemprice'];
$pro_producttype=implode(",",$_POST['fav']);

 include 'connection.php';
 $sql="insert into tbl_product (pro_name,pro_quantity,pro_dateofarrival,
             pro_supplierid,pro_peritemprice,pro_producttype)
  values('$pro_name','$pro_quantity',CURRENT_DATE(),'$pro_supplierid','$pro_peritemprice','$pro_producttype')";
  $ex  = $conn->query($sql);


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
