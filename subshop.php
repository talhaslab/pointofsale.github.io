<?php
  session_start();
if(!isset( $_SESSION['id']))
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

<?php include 'sidebar.php'; ?>

<!-- Main Bosy-->
<section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-files-o"></i> Branch Stock</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_document_alt"></i>Add</li>
            <li><i class="fa fa-files-o" ></i>Branch Stock</li>
          </ol>
        </div>
      </div>



                    



            <!-- Costumer Informtion -->






           <div id="notification">                    </div>




           <div class="row">
              <div class="col-lg-12 "  >
          <section class="panel">
            <header class="panel-heading">
           Branch Stock 
            </header>
             <div class="panel-body">
              
               <div class="form-group">
              <input type="text" id="name" class="form-control " name="name" autocomplete="off" placeholder="Enter Product">
                 </div>
                 <div class="form-group">
              <input type="number" id="quantity" class="form-control  " name="quantity" min="1" placeholder="Enter Quantity" >
               </div>
               <button id="submit" class="form-group btn btn-info pull-right">Submit </button>
      
                                



              </div>
           <!-- Panel Section-->
          </section>
            </div>
            </div>

            
    <?php

      if(isset($_GET['total']))
        {


        ?>



                

            <div id="notifications">                    </div>

         <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
              Sale Report
                            </header>
              <div class="panel-body">
                
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Total Sale</label>
                    <div class="col-lg-10">
                      <input type="email" class="form-control" id="totalsale" 
                      value="<?php echo $_GET['total'];?>" readonly>
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">Total Expences</label>
                    <div class="col-lg-10">
                      <input type="number" class="form-control" id="totalexpences" placeholder="Total Expences">
                    </div>
                  </div>
                   
                   <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">Cash Alredy Recived</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="alreadyrecivedcash" placeholder="Recived Cash" disabled>
                    </div>
                  </div>
                   
                    <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">Reciveable cash </label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="ReciveableCash" placeholder="Reciveable cash" readonly>
                    </div>
                  </div>
                   

                              


                   <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button type="button" id="save" class="btn btn-danger">Save</button>
                    </div>
                  </div>
                
              </div>
            </section>



   <?php }  ?>







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