
<?php
include 'connection.php';


$resale_name=$_POST['resalename'];
$price=$_POST['resaleprice'];


$sql="INSERT INTO `tbl_resale` ( `resale_name`, `price`, `date`, `time`) VALUES ( '$resale_name', '$price', CURRENT_DATE(), CURRENT_TIME())";

$ex=$conn->query($sql);
  if($ex)
  {
    echo "<div class='alert alert-success'>
  <strong>Success!</strong> Data Inserted Successfully
</div>";
header("refresh:1; url=Addresale.php");
  }
 else {
echo "  <div class='alert alert-danger'>
     <strong>Danger!</strong>Data not inserted.".$conn->error."
   </div>";
}

?>