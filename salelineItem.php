<?php
  session_start();
if(!isset( $_SESSION['id']) || $_SESSION['id']!= 1){

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
<?php
include 'connection.php';
 include 'sidebar.php'; ?>
       <!--Body Start-->
       <section id="main-content">
         <section class="wrapper">
           <div class="row">
             <div class="col-lg-12">
               <h3 class="page-header"><i class="fa fa-table"></i> See Sales</h3>
               <ol class="breadcrumb">
                 <li><i class="fa fa-home"></i><a href="index1.php">Home</a></li>
                 <li><i class="fa fa-table"></i>Sales </li>
                 <li><i class="fa fa-th-list"></i>See Sales</li>
               </ol>
             </div>
           </div>
                     
             

              

                       <!-- Search Send-->
                        <?php

 
                          if(isset($_GET['id']))
                          { 


                          $sql="SELECT amount AS total FROM `tbl_transaction` where id =".$_GET['id'];
                        $ex= $conn->query($sql);
                            $row=mysqli_fetch_array($ex);
                          }
                          
                          $sql="SELECT s.id,p.pro_name,s.pro_quantity,s.pro_price from tbl_product p ,tbl_salelineitem s where s.pro_id=p.pro_id AND s.pro_transactionId=".$_GET['id'];

                          $n= $conn->query($sql);

                      
                         ?>
                            

                         <div class="row">
                       <div class="col-lg-5">
                         <h4><b>Transaction Amount</b></h4>
                       </div>  
                        <div class="col-lg-7">
                       <h4><b> <?php echo $row['total']; ?> </b> RS </h4></div>
                       </div>  
                     


                       </div>













                 </section>
                </div>
              </div>





                   <!--PAge Start-->
                   <div class="row">
                     <div class="col-lg-12">
                       <section class="panel">
                         <header class="panel-heading">
                          <b  style="font-size:20px">  Sale </b>
                           <a class="btn " href="sale.php"><span data-icon="&#xe050;"></span></a>
                         </header>


                         <table class="table table-striped table-advance table-hover">
                           <tbody>
                             <tr>
                               <th><i class="icon_profile"></i> Product Name</th>
                               <th><i class="icon_mobile"></i> Quantity</th>
                                <th><span data-icon="&#xe086;"></span>Price</th>
                                <th><span data-icon="&#xe086;"></span>Total</th>
                                <th>Action</th>
                             </tr>
                             <?php
                             while($row = mysqli_fetch_array($n))
                             {

                                  ?>

                             <tr>
                               <td style="align:center"><?php echo $row['pro_name'];?></td>
                              <td style="align:center"><?php echo $row['pro_quantity'];?></td>
                              <td style="align:center"> <?php echo $row['pro_price'];?><b> RS </b> </td>
                               <td style="align:center"> <?php echo $row['pro_price']*$row['pro_quantity'];?><b> RS </b> </td>
                               <td>
                               <div class="btn-group">
                                   <a class="btn btn-danger" href="returnproduct.php?id= <?php echo $row['id']; ?>"><abbr title="Delete"><i class="icon_close_alt2"></i></abbr></a>
                                 </div>
                                </td>



                             </tr>
                            <?Php }?>
                           </tbody>
                         </table>
                       </section>
                     </div>
                   </div>







            <!--Page End-->
        </section>
      </section>

</section>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- nicescroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<!--custome script for all page-->
<script src="js/scripts.js"></script>


</body>
