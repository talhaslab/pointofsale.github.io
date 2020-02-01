<?php
  session_start();
if(!isset( $_SESSION['id']) || $_SESSION['id']!= 1)
{

    header("Location:index.php");
}





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

<?php 

include 'sidebar.php';

$at = new reports;
$at->incomestament();
       ?>

<!-- Main Bosy-->
<section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-files-o"></i> Income Stament</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_document_alt"></i>Display</li>
            <li><i class="fa fa-files-o" ></i>Income statment</li>
          </ol>
        </div>
      </div>



                    



            <!-- Costumer Informtion -->






           <div class="col-lg-12">
            <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
            Income Stament
              </header>
              <div class="panel-body">
                
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-5 control-label"> Sale</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control"  
                      value="<?php echo $at->sale(); ?>" readonly>
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-5 control-label">Expences</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control"  
                      value="<?php  echo $at->expenses(); ?>" readonly>
                    
                    </div>
                  </div>
                  
                 
                  
                  <?php $r = str_replace(',', '', $at->sale())-str_replace(',', '', $at->expenses())-str_replace(',', '', $at->resales()); ?>

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-10 control-label">Resale</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control"  
                      value="<?php echo $at->resales() ?>" readonly>
                    
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-10 control-label">Total Sale</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control"  
                      value="<?php echo $r; ?>" readonly>
                    
                    </div>
                  </div>
                  
                
              </div>
            </section>
              </div>
              
                





            








           </div>









</section>
</section>
</section>





























<!--PAge seeting-->




















 <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  
  <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <script  src="js/index1.js"></script>


<script type="text/javascript" src="subshop.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

</body>
</html>