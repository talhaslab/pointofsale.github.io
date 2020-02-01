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
$sql="select * from tbl_supplier";
$all_data= $conn->query($sql);
$num_rows=$all_data->num_rows;
$perpage=10;
$offset=0;
$no_of_pages=ceil($num_rows/$perpage);
$current_page='';
if (isset($_GET['page']))
{
  $current_page=$_GET['page'];
  $offset=($perpage*$current_page)-$perpage;
}
$sql="select * from tbl_supplier LIMIT ".$perpage." OFFSET ". $offset;
$n= $conn->query($sql);

 ?>
<?php include 'sidebar.php'; ?>
       <!--Body Start-->
       <section id="main-content">
         <section class="wrapper">
           <div class="row">
             <div class="col-lg-12">
               <h3 class="page-header"><i class="fa fa-table"></i> Display Supplier</h3>
               <ol class="breadcrumb">
                 <li><i class="fa fa-home"></i><a href="index1.php">Home</a></li>
                 <li><i class="fa fa-table"></i>Display</li>
                 <li><i class="fa fa-th-list"></i>Display Supplier</li>
               </ol>
             </div>
           </div>



              <div class="row">
                <div class="col-lg-12">
                  <section class="panel">
                    <header class="panel-heading">
                    <b  style="font-size:20px"> Search  Supplier </b>
                     </header>
                       <!--Search Section-->
                       <form class="well form-inline" action="DisplayS.php" method="post"  id="contact_form">

                          <div class="form-group">
                           <div class="col-lg-8  ">
                            <input type="text" class="form-control"  name="sup_name" placeholder="supplier name">
                           </div>


                         <div class=" col-lg-3 ">
                           <button type="submit" class="btn btn-info" >
                           Search </button>
                         </div>
                       </div>
                       </form>


                       <?php

                        if (isset($_POST['sup_name']))
                        {

                        $sup_name=$_POST['sup_name'];
                        $sql="select * from tbl_supplier where sup_name='$sup_name'";
                        $ex= $conn->query($sql);
                            $row=mysqli_fetch_array($ex);

                    echo  ' <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                            <th><i class="icon_profile"></i> Full Name</th>
                            <th><i class="icon_mobile"></i> Mob ile</th>
                            <th><span data-icon="&#xe086;"></span>Amount Payable</th>

                            <th><i class="icon_cogs"></i> Action</th>
                            </tr>';
                    echo      '<tr>
                              <td style="align:center">'.  $row['sup_name'].'</td>
                             <td style="align:center">+92'.$row['sup_contact'].'</td>
                             <td style="align:center">'.$row['sup_payment'].'<b> RS </b> </td>
                              <td>
                                <div class="btn-group">
                                  <a class="btn btn-primary " href="update.php?id='.  $row['sup_id'] .'"  ><abbr title="Update supplier"><i class="icon_plus_alt2"></i></abbr></a>
                                  <a class="btn btn-success" href="profile.php?id='.  $row['sup_id'] .' "><abbr title="Profile"><span data-icon="&#xe107;"></span></abbr></a>
                                  <a class="btn btn-danger" href="delete.php?id= '.   $row['sup_id'] .'"><abbr title="Delete"><i class="icon_close_alt2"></i></abbr></a>
                                </div>
                              </td>
                            </tr></table>';

                        }

                        ?>



                       <!-- Search Send-->
                         <?php
                          $sql="SELECT SUM(sup_payment) AS total FROM `tbl_supplier`";
                        $ex= $conn->query($sql);
                            $row=mysqli_fetch_array($ex);



                         ?>
                            

                         <div class="row">
                       <div class="col-lg-5">
                         <h4><b>Total Payable Amount</b></h4>
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
                          <b  style="font-size:20px">  Supplier </b>
                           <a class="btn " href="addsupplier.php"><span data-icon="&#xe050;"></span></a>
                         </header>


                         <table class="table table-striped table-advance table-hover">
                           <tbody>
                             <tr>
                               <th><i class="icon_profile"></i> Full Name</th>
                               <th><i class="icon_mobile"></i> Mob ile</th>
                                <th><span data-icon="&#xe086;"></span>Amount Payable</th>

                               <th><i class="icon_cogs"></i> Action</th>
                             </tr>
                             <?php
                             while($row = mysqli_fetch_array($n))
                             {

                                  ?>

                             <tr>
                               <td style="align:center"><?php echo $row['sup_name'];?></td>
                              <td style="align:center">+92<?php echo $row['sup_contact'];?></td>
                              <td style="align:center"> <?php echo $row['sup_payment'];?><b> RS </b> </td>
                               <td>
                                 <div class="btn-group">
                                   <a class="btn btn-primary " href="update.php?id=<?php echo $row['sup_id']; ?>"  ><abbr title="Update supplier"><i class="icon_plus_alt2"></i></abbr></a>
                                   <a class="btn btn-success" href="profile.php?id= <?php echo $row['sup_id']; ?> "><abbr title="Profile"><span data-icon="&#xe107;"></span></abbr></a>
                                   <a class="btn btn-danger" href="delete.php?id= <?php echo $row['sup_id']; ?>"><abbr title="Delete"><i class="icon_close_alt2"></i></abbr></a>
                                 </div>
                               </td>
                             </tr>
                            <?Php }?>
                           </tbody>
                         </table>
                   <div class="row">
                     <div class="col-sm-5 col-sm-offset-3">
            <nav aria-label="Page navigation">
                 <ul class="pagination">
                    <li class="
                        <?php if($current_page==1||$current_page=='')
                        {
                          echo "disabled";
                        } ?>
                    ">
                     <a href="<?php
                        if($current_page==1||$current_page=='')
                        {
                          echo "#";
                        }
                        else
                        {
                          echo '?page='.($current_page-1);
                        }
                     ?>" aria-label="Previous">
                       <span aria-hidden="true">&laquo;</span>
                     </a>
                   </li>
                               <?php for($i=1; $i<=$no_of_pages;$i++):?>
                          <li class="<?php
                          if($current_page==$i )
                          {echo 'active';}
                          elseif($current_page==''&& $i==1)
                          {echo 'active';} ?>"
                           ><a href="?page=<?php echo $i; ?> "><?php echo $i; ?></a></li>
                              <?php endfor;  ?>
                           <li
                           class="
                               <?php if($current_page==$no_of_pages)
                               {
                                 echo "disabled";
                               } ?>
                           ">
                   <a href=
                   "<?php
                      if($current_page==$no_of_pages)
                      {
                        echo "#";
                      }
                      elseif($current_page=='')
                      {
                        echo '?page=2';
                      }
                      else
                      {
                        echo '?page=' .($current_page+1);
                      }
                   ?>" aria-label="Next">
                     <span aria-hidden="true">&raquo;</span>
                   </a>
                 </li>
               </ul>
             </nav>
           </div>
         </div>
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
