<?php
if(!isset( $_SESSION['id']))
{

    header("Location:index.php");
}





?>











  <section id="container" class="">


    <header class="header "    style="background:#404040  ">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index1.php" class="logo">Point Of <span class="lite">Sale System</span></a>
      <!--logo end-->


      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">






          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" >
                            <span class="profile-ava">
                                
                            </span>
                            <span class="username"><?php echo $_SESSION['id'] ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a ><i class="icon_profile"></i>Change Password</a>
              </li>
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->
        <?php  include "accees.php";?>
    <!--sidebar start-->
    <aside>
    <div id="sidebar" class="nav-collapse  " style="background:#666666" >
      <!-- sidebar menu start-->
      <ul class="sidebar-menu "    >
         <?php 

         $obj=new access;
         $role =$obj->getrole($_SESSION['id']);
        if ($role =="Owner")
                      {
        ?>
 

        <li >
          <a class="" href="index1.php">
          <i class="icon_house_alt"></i>
          <span style="">Home</span>
          </a>
        </li>  <?php } ?>
        <li class="sub-menu">
          <a href="javascript:;" class="">
                        <i class="icon_document_alt"></i>
                        <span>Add</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
          <ul class="sub">
        <?php                if ($role =="Owner")
                      {
              ?>

            <li><a class="" href="addsupplier.php">Supplier</a></li>
            <li><a class="" href="product.php">Product</a></li>
            <li><a class="" href="addemployee.php">Employee</a></li>
           
            <?php } ?>
            
             
             
                    
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
                        <i class="icon_desktop"></i>
                        <span>Display</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
          <ul class="sub">
            <?php if ($role =="Owner")
                      {
                ?>

            <li><a class="" href="DisplayS.php">Supplier</a></li>
              <li><a class="" href="income.php">Income</a></li>
              <li><a class="" href="profitcalculater.php">Profit Calculater</a></li>
			  <li><a class="" href="Displayexp.php">Display Expence</a></li>
			  <li><a class="" href="displayemp.php">Display Employee</a></li>
        
            <li><a class="" href="DisplayP.php">Product</a></li>
			<?php }  ?>
          
          </ul>
        </li>

        <li class="sub-menu">
          <a href="javascript:;" class="">
                        <i class="fa fa-signal"></i>
                        <span>Sales</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
          <ul class="sub">
            <li><a class="" href="sale.php">Start Sales</a></li>
            
             
            <?php

                      
                      if ($role =="Owner")
                      {
            ?>

            <li><a class="" href="seesale.php">See Sales</a></li>
            
                        <?php
                      }
                        ?>
          </ul>
        </li>
           


      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
    <!--sidebar end-->

