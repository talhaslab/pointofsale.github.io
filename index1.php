<?php
 
  session_start();
if(!isset( $_SESSION['id']) || $_SESSION['id']!= 1)
{

    header("Location:index.php");

 
}

         
     







?>




 


<!DOCTYPE html>
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
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<!-- Body Start    -->

<body>
  <!-- container section start -->

        <?php include 'sidebar.php';
		$at = new reports;
$at->incomestament();

		
		?>


    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-10">
            <h3 class="page-header"><i class="fa fa-tachometer"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index1.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Profile</li>
            </ol>
          </div>
          
        </div>
<?php 
			  $r = str_replace(',', '', $at->sale())-str_replace(',', '', $at->expenses())-str_replace(',', '', $at->resales()); ?>
        <div class="row">
          <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
            <i class="fa fa-money"></i>
              <div class="count" ><?php echo $r; ?>
			  </div>
			  
			  			 
              <div class="title">Available Cash</div>
               
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa  fa-tag "></i>
              <div class="count"> 
                 

                  <?php  echo $at->expenses(); ?>


               </div>
              <div class="title">Today Expense</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-signal"></i>
              <div class="count">
                <?php
                  
                 echo  $at->sale();


                ?>
              </div>
              <div class="title">Today Sales</div>
            </div>
            <!--/.info-box-->
          </div>
		  

          
          <!--/.col-->

        </div>
        <!--/.row-->
                
          <div class="row">
          
                <!--Supplier Installment-->
                    <div class="col-lg-8 col-lg-offset-2 ">
                    <section class="panel">
                    <div class="panel-heading ">
                    Records 
                    </div>

                    <div class="panel-body">
                  <!--form Expances-->   
                    
                    <select class="form-control input-lg m-bot15" id="option" name="option">
                                              <option value="Installment Paid" >Installment Paid</option>
    
                                              <option value="Expences">Expences</option>
                                          </select>
                      
  
                    <div class="form-group" id="input">
                    <input type="text" id="names" class="form-control " name="names" autocomplete="off" placeholder="Supplier Name">
                    </div>
                    <div class="form-group">
                    <input type="number" id="price"    class="form-control " name="price" min="1"  placeholder="Amount">
                    </div>
                    
                      <button id="submit" class="form-contro btn btn-info pull-right" >Save </button>
                          <!--form expances ended-->
                    </div>
                  
                    </section>
  
                    </div>
          
                     </div>               
                   
                   <!-- supplier Installments End-->    
                 
                
                   
                   <!-- Purchase List Added --  >
                                  
                        
      
  
             
                  





                     




                  











                     










        

              <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- project team & activity end -->

      </section>
          </section>
    <!--main content end-->
  </section>
  <!-- container section start -->


  














  <!-- javascripts -->
  <!-- javascripts -->

  <script src="js/jquery.js"></script>

  <script src="js/jquery-ui-1.10.4.min.js"></script>

  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>

  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <!-- jQuery full calendar -->

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
   
   
<script type="text/javascript" src="main.js"></script>

     

     
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    


   
    <!-- custom script for this page-->

</body>
<!--Body end-->
</html> 
