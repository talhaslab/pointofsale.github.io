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

</head>



















<body>
        <?php include 'sidebar.php';?>

<!-- Main content-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-files-o"></i> Add Product</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_document_alt"></i>Add</li>
            <li><i class="fa fa-files-o"></i>Add Product</li>
          </ol>
        </div>
      </div>


           <div class="row">
              <div class="col-lg-6 col-sm-offset-3"  >
          <section class="panel">
            <header class="panel-heading">
               Add Product
            </header>

            <div class="panel-body">
              <?php
              include 'peduct.php';
              include 'connection.php';
              $sql="select sup_name,sup_id from tbl_supplier";

               $ex=$conn->query($sql);



              ?>

             <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                 <div class="form-group">
                 <label class="col-sm-2 control-label">Name</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control"  name="pro_name">
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control"  name="pro_quantity">
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-lg-2" for="inputSuccess">Supplier Name</label>
                 <div class="col-lg-10">
                          <select class="form-control m-bot15" name="pro_supplierid">
                          <?php         while($row=mysqli_fetch_assoc($ex))
                            {
                                ?>
                            <option  value="<?php echo $row['sup_id']; ?>"><?php echo $row['sup_name']; ?> </option>


                            <?php
                             }
                            ?>

                             </select>
                                    </div>
               </div>

              <div class="form-group">
              <label class="col-sm-2 control-label">Price PI</label>
              <div class="col-sm-10">
                <input type="number" class="form-control"  name="pro_peritemprice">
               </div>
             </div>

            






            <div class="form-group ">
              <div class="col-lg-offset-2 col-lg-10 ">
                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                <button class="btn btn-default" type="button">Cancel</button>
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
<!-- jaPlugin -->
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

<!-- custom-->
<script src="js/scripts.js"></script>


</body>




</html>
