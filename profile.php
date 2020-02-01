 







<?php


  session_start();
if(!isset( $_SESSION['id']) || $_SESSION['id']!= 1)
{

    header("Location:index.php");
}















if (isset($_GET['id']))
{
   include 'connection.php';
   $id=$_GET['id'];
   $sql="SELECT * from tbl_supplier where sup_id='$id'";
   $ex=$conn->query($sql);
   $row= mysqli_fetch_array($ex);
   $sql1="SELECT * FROM `sup_installments` WHERE sup_id='$id' ORDER BY Date DESC";
   $ex1=$conn->query($sql1);
   
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
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
<?php include 'sidebar.php'; ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper" >
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index1.php">Home</a></li>
              <li><i class="icon_documents_alt"></i>Display Supplier</li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body" style="background:#666666">
                <div class="col-lg-2 col-sm-2">
                  <h4><?php echo $row['sup_name']; ?></h4>
                  <h6><?php
                      if($row['sup_status']==1)
                      {
                        echo 'Active';
                      }
                      else {
                        echo 'Inactive';
                      }

                   ?>


                  </h6>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <p><?php echo $row['sup_address']; ?></p>

                  <p><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $row['sup_email']; ?></p>
                  <p><i class="fa fa-phone" aria-hidden="true"></i>+92- <?php echo $row['sup_contact']; ?></i></p>
                  <p><i class="fa fa-money" aria-hidden="true"></i> <?php echo $row['sup_payment']; ?> RS</p>
                              </div>



              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Installments
                                      </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Bio Data
                                      </a>
                  </li>

                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <div id="recent-activity" class="tab-pane active">
                    <div class="profile-activity">







                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                        <!--table start-->
                        <div class="col-sm-12">
                          <section class="panel">
                            <header class="panel-heading">
                              Installment Record
                            </header>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
                                  <th><i class="fa fa-clock-o" aria-hidden="true"></i> Time</th>
                                  <th><i class="fa fa-money" aria-hidden="true"> Amount</th>
                                </tr>
                              </thead>
                              <tbody>
                               <?php 
                                    $i =1;
                               while ($rows =mysqli_fetch_assoc($ex1))


                                         {
                               ?>
                                   
                                  <tr>
                                  <td><?php echo $i ;?></td>
                                  <td><?php echo $rows['Date'];?></td>
                                  <td><?php echo $rows['Time'];?></td>
                                  <td><?php echo $rows['price'];?></td>
                                </tr>

                               <?Php
                                $i=$i+1;
                                 }

                               ?>


                             
                              </tbody>
                            </table>
                          </section>
                        </div>
                        <!-- Table End-->
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- profile -->
                     <?php


                        $sql2="SELECT SUM( pro_peritemprice*pro_quantity) as available FROM `tbl_product` WHERE pro_supplierid='$id'";
                        $ava=$conn->query($sql2);
                        $rows= mysqli_fetch_array($ava);
                        $availableamount=$rows['available'];










                     ?>


                  <div id="profile" class="tab-pane">
                    <section class="panel">
                      <div class="bio-graph-heading">
                        
                        <div class="row">
                         <div class="col-lg-4">
                              <h5><b>
                                Available Stock Amount 
                              </b></h5>
                          </div>    
                             <div class="col-lg-4">
                              <h5><b>
                                  
                           <?php echo $availableamount; ?></b> RS</h5>
                          </div>    

                           

                         </div>     
                          
                          <div class="row">
                         <div class="col-lg-4">
                              <h5><b>
                                Payable Amount 
                              </b></h5>
                          </div>    
                             <div class="col-lg-4">
                              <h5><b>
                                  <?php echo $row['sup_payment']; ?>
                              </b> RS</h5>
                          </div>    

                           

                         </div>

                         <?php
                        $freeamounnt;
                        if($availableamount>$row['sup_payment'])
                        {
                          $freeamounnt=$availableamount-$row['sup_payment'];

                        }
                        else
                        {
                            $freeamounnt=0;                          
                        }

                       ?>
                       
                            
                          <div class="row">
                         <div class="col-lg-4">
                              <h5><b>
                                Free Amount 
                              </b></h5>
                          </div>    
                             <div class="col-lg-4">
                              <h5><b>
                                  <?php  echo $freeamounnt;?>
                              </b>RS</h5>
                          </div>    

                           

                         </div>     

     


                                              </div>
                      <div class="panel-body bio-graph-info">
                       <?php
                           $sql="SELECT * FROM `tbl_product` WHERE pro_supplierid='$id'";
                           $n=$conn->query($sql);
  

                        ?> 



                        <table class="table table-striped table-advance table-hover">
                           <tbody>
                             <tr>
                               <th><i class="icon_profile"></i> Name</th>
                               <th>Quantity</th>
                                <th><span data-icon="&#xe086;"></span>Per Item Price</th>
                              <th>Last Date of Arrival</th>
                               <th>Sub Quantity</th>
                               <th>Total Amount </th>
                              
                             </tr>
                             <?php
                             while($row = mysqli_fetch_array($n))
                             {

                                  ?>

                             <tr>
                               <td style="align:center"><?php echo $row['pro_name'];?></td>
                              <td style="align:center"><?php echo $row['pro_quantity'];?></td>
                              <td style="align:center"> <?php echo $row['pro_peritemprice'];?><b> RS </b> </td>
                               <td style="align:center"><?php echo $row['pro_dateofarrival'];?></td>
                               <td style="align:center"><?php echo $row['pro_subquantity'];?></td>
                                <td style="align:center"><?php echo $row['pro_quantity']*$row['pro_peritemprice'];?></td>
                            
                                   
                             </tr>
                            <?Php }?>
                           </tbody>
                         </table>
                        </div>
                      </div>
                    </section>
                    <section>
                                          </section>
                  </div>



                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>


</body>

</html>
