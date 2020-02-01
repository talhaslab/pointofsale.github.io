<?php
require_once('connection.php');
  session_start();
if(!isset( $_SESSION['id']))
{

    header("Location:index.php");
}
?>


<?php
require_once('connection.php');
$id=$_GET['id'];

$query="SELECt * FROM tbl_coustmer WHERE id='$id'";
$exe = mysqli_query($conn, $query);

if($ok=mysqli_fetch_array($exe)){



?>









<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>POS</title>
  <link rel="stylesheet" href="custom.css" type="text/css">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />



  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>



  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>




</head>





























<body>

<?php include 'sidebar.php'; ?>
<!-- Main content-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-files-o"></i> update Costumer</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-files-o"></i>Update Costumer</li>
          </ol>
        </div>
      </div>

           <div class="row">
              <div class="col-lg-9 col-sm-offset-2"  >
          <section class="panel">
            <header class="panel-heading">
               Update Costumer
            </header>

            <div class="panel-body">


              <form class="well form-horizontal" action="updatedata.php?id=<?php echo $ok['id'];?>" method="post"  id="contact_form">

                 

              <div class="form-group">
              <label class="col-sm-2 ">Payable Amount</label>
              <div class="col-sm-8 ">
                <input type="number" class="form-control"  name="cou_payment" value="<?php echo $ok['cou_payment']; ?>">
               </div>
             </div>


             

            

            <div class="form-group ">
              <div class="col-lg-offset-2 col-lg-10 ">
                <button type="submit" class="btn btn-warning" >
                  Save <span class="glyphicon glyphicon-send"></span></button>

               <a href="Displayco.php"> <button class="btn btn-default" type="button"  >Cancel</button></a>
              </div>
            </div>















             </form>

            </div>
          </section>

        </div>
      </div>




</section>
</section>







</section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!-- custom-->
<script src="js/scripts.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

  <script  src="js/index1.js"></script>


</body>




</html>
<?php

}
?>