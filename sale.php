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
          <h3 class="page-header"><i class="fa fa-files-o"></i> Sale</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_document_alt"></i>sales</li>
            <li><i class="fa fa-files-o" ></i>Start sales</li>
          </ol>
        </div>
      </div>



                    



           <div class="row">
              <div class="col-lg-12 "  >
          <section class="panel">
            <header class="panel-heading">
              Coustmer Detail
            </header>
             <div class="panel-body">
              <div class="form-inline">
             


              <div class="form-group">
                  <select class="form-control  col-lg-10"   id="Billtype"  name="Billtype">
                                              <option value="on Retail">On Retail</option>
                                              <option value="on Wholesale">On Wholesale</option>
                                              
                                          </select>
                          
                
                  </div>









              <div class="form-group">
              <input type="text" id="Coustmername" class="form-control " name="Coustmername" autocomplete="off" placeholder="Costumer Name">
              </div>
               
      
              </div>                  

                
                












              </div>
           <!-- Panel Section-->
          </section>
            </div>
            </div>


            <!-- Costumer Informtion -->








 


           <div class="row">
              <div class="col-lg-12 "  >
          <section class="panel">
            <header class="panel-heading">
               Start Sales
            </header>
             <div class="panel-body">
              <div class="form-inline">
               <div class="form-group">
			   
              <input type="text" id="name" class="form-control " name="name" autocomplete="off" placeholder="Enter Product">
                 </div>
                 <div class="form-group">
              <input type="number" id="quantity" class="form-control  " name="quantity" min="1" placeholder="Enter Quantity" >
               </div>
               <div class="form-group">
               <input type="number" id="price"    class="form-control " name="price" min="1"  placeholder="Enter Price">
               </div>
               <button id="submit" class="form-contro btn btn-info">Submit </button>
      
              </div>                  



              </div>
           <!-- Panel Section-->
          </section>
            </div>
            </div>

            <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                List of items
              </header>
              <div class="table-responsive">
                <table id="salelineitem" class="table" border="2px">
				<thead>
				<th>Item Name</th>

				<th>Qty</th>
				<th>Per item Price</th>
				<th>Total</th>
				</thead>
				<tbody>



				</tbody>
				</table>
                 <!-- table data-->
                 <div class="row">
               <div class="col-sm-4  col-sm-offset-3">
              <h4>Total Bill :</h4> 
          </div>
                <div class="col-sm-4 ">
                <h4><div id="totalbill"></div></h4>
          </div>

           </div>
          
          
          
           <div class="row pull-right">
               <div class="col-lg-12">
              <div id="recamount"></div>
            </div>
            </div>
      
            <div class="row pull-right">
               <div class="col-lg-12">
              <div id="discount"></div>
			  <h4 style="margin-right:42px;"> 
              Total:
			  
			  <input id="discounts" style="margin-top: -19px;margin-left: 285px;" type="number" readonly>
             </h4>
            </div>
            </div>
       


                <div class="row ">
                  
                               
          <div class="col-sm-4  col-sm-offset-3">
           <h4 style="margin-left: 213px;">Remaing Amount :</h4> 
          </div>
                <div class="col-sm-4 ">
               <h4> <div id="remamount" style="margin-left: 114px;"> </div>  </h4> 
          </div>  
           </div>
             
            <div class="row">
              <div class="col-sm-2 pull-right">
               
               <div id="Save"> <input type="button" class="btn btn-danger" id="save" name="save" value="Save">  </div>
               
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


<script type="text/javascript" src="salejquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

</body>
</html>