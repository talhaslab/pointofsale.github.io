<?php
include "accees.php";


if(isset($_POST['coustmer']))
{

  $name=$_POST['name'];
  $at=new costumer;
  $x=$at->validcoustmer($name);
    if($x)
    {
      echo 0 ;
    }
    else
    {
      echo 1;
    }




}
if(isset($_POST['reciveablecash']))
{
 
 $expences= $_POST['totalexpens'];
 $reciveablecash =$_POST['reciveablecash'];
 $at =new  sale;

 if($at->subrecords($expences,$reciveablecash))
 {
    echo "<div class='alert alert-success'>
  <strong>Success!</strong> Update Successfully
</div>";

 }
 else
 {
  echo "  <div class='alert alert-danger'>
     <strong>Danger!</strong>Data not inserted
   </div>";
  
 }

}



if(isset($_POST['cash']))
{

 $at = new reports;
 echo $at->shopcashrecived();



}

if(isset($_POST['subshop']))
{


$subname=$_POST['subname'];
$subprice=$_POST['subprice'];
$subquantity=$_POST['subquantit'];        
$subtotal=$_POST ['subtotal'];
$at=new sale;
 $tid=$at->subtransaction($subtotal);
if($at->sublineitem($subname,$subquantity,$subprice,$tid))
{
  echo  $tid;
}
else
{
 echo "  <div class='alert alert-danger'>
     <strong>Danger!</strong>Data not inserted
   </div>";
 
}



}


if(isset($_POST['subquantity']))
{
  $qunatitytype =$_POST['subquantity'];
  $name=$_POST['subname'];
   
    $at=new item;
    $actuallquantity=$at->subquantity($name);
      $qunatitytype=intval($qunatitytype);
     if ($actuallquantity<$qunatitytype)
     {
       echo 1;}
     else
     {     echo 0;}
     
    

}



if(isset($_POST['quanti']))
{

 $quantity= $_POST['quanti'];
 $name= $_POST['name'];

  $it=new item;
  if($it->updatequantity($name,$quantity))
  {
    echo "<div class='alert alert-success'>
  <strong>Success!</strong> Update Successfully
</div>";
  } 
  else
  {

    echo "  <div class='alert alert-danger'>
     <strong>Danger!</strong>Data not inserted
   </div>";

  }
}








if(isset($_POST['sale']))
{

 $x=new reports();
 $at= $x->sale();
 echo $at;

}  



if(isset($_POST['namevalid']))
{


 $x=$_POST['name'];
  $at =new item;
   $x =$at->validitem($x);
    if($x)
    {
      echo 0 ;
    }
    else
    {
      echo 1;
    }


}

if(isset($_POST['supvalid']))
{


 $x=$_POST['name'];
  $at =new supplier;
   $x =$at->validsupplier($x);
    if($x)
    {
      echo 0 ;
    }
    else
    {
      echo 1;
    }


}









  if(isset($_POST['searchsup']))
  {$q=$_POST['query'];
  
  $at =new Connection;
  
  $x= $at->autocompletes($q);
  
  echo json_encode($x);
  
  } 

 if(isset($_POST['cou']))
 {

  $q=$_POST['query'];
  
  $at =new Connection;
  
  $x= $at->completecou($q);
  
  echo json_encode($x);

 }











  if(isset($_POST['search']))
  {$x=$_POST['query'];
	
	$at =new Connection;
	
	$x= $at->autocomplete($x);
	
	echo json_encode($x);
	
  }	

  
  if(isset($_POST['names']))
  {$x=$_POST['query'];
	
	$at =new Connection;
	
	$x= $at->autocompletes($x);
	
	echo json_encode($x);
	
  }	

 if(isset($_POST['type']))
 {
       
    $name; 
       if(isset($_POST['name']))
       {
        $name=  $_POST['name'];
      }
     $price =$_POST['price'];
     $type=$_POST['type'];

     if ($type== "Installment Paid")
     {
          $s =new supplier;
         $result= $s->addinstallment($name,$price);
         if($result=="Yes")
         {
         	echo "Updated";
         }
         else
         {
         	echo "Invalid amount";
         }

     }
     elseif ($type=="Expences")
     {
          $x=new Connection;
          $result= $x->addexpense($name,$price);
          if($result=="Yes")
          {
          	echo "Updated ";
          }	
          else
          {
          	echo "Not Updated";
          }
     }
     else
     {
     	$x= new Connection;
     	$result=$x->runcash($price);
     	if($result=="Yes")
          {
          	echo "Updated ";
          }	
          else
          {
          	echo "Not Updated";
          }
     }
 }
  	










  if (isset ($_POST['quantity']))
  {  
     $qunatitytype=$_POST['quantity'];
	  $x=$_POST['query'];
	  $at=new Connection;
  $row=$at->quantity($x);
    
  
     
	  echo json_encode($row); 
        	   
	  
  }	
  
  
  
  
  
  
  
  
  
  if (isset ($_POST['insert']))
  {


	
	$name =$_POST['name'];
    $price =$_POST['price'];
	$quantity =$_POST['quantit'];
	$total =$_POST['total'];
	$total =intval($total);
   $reciveamount=$_POST['reciveamount'];
   $billtype=$_POST['billtype'];
   $couname=$_POST['couname'];
    $tbl=$_POST['tbl'];
    $x =new sale;
      $tid=$x->transaction($total);  
        
        if ($x->lineitem($name,$quantity,$price,$tid))
        {
            echo $tid;
        }   
       else
         {
              echo "Not Saved";
          }





    
	
  }
 



  if(isset($_POST['addpur']))
  {

      $name =$_POST['name'];
     $price =$_POST['price'];
     $quantity =$_POST['quantit'];
     $total =$_POST['total'];
     $total =intval($total);
     $supname=$_POST['supname'];
     $paymenttype=$_POST['paymenttype'];
    
      $x=new purchases;
      $tid=$x->purchasesid($supname,$paymenttype,$total);
    
        if($paymenttype == "on Credit")
        {
          
          $sup = new supplier;
         $sup->supamount($supname,$total);
        }




      if($x->purchaselineitem($name,$price,$quantity,$tid))
      {
        echo "Purchases Saved";
      }     
      else
      {
        echo "Purchases Not saved";
      } 



  }













?>

