<?php

require('fpdf181/fpdf.php');
include "accees.php";


if (isset ($_GET['insert']))
  {
  
  $name =$_GET['name'];
    $price =$_GET['price'];
  $quantity =$_GET['quantity'];
  $total =$_GET['total'];
  $dicount = $_GET['discount'];


  $total =intval($total);
  $dicount =intval($dicount);
   $reciveamount=$_GET['reciveamount'];
   $couname=$_GET['couname'];
  $returnamount=$_GET['returnamount'];
  $returnamount =  $reciveamount -$dicount  ;
  $discountamount = $total - $dicount;
  
  $billtype=$_GET['billtype'];
    $tbl=$_GET['tbl'];
  $tid=$_GET['tid'];
    $names=explode(",",$name[0]);
  $prices=explode(",",$price[0]); 
  $quantitys=explode(",",$quantity[0]);
   $tbls=explode(",",$tbl[0]);

$n =new costumer;
$couaddress;
$coupayment;
$coucontact;
$payment;
if( $billtype == "on Wholesale") {
 $couaddress =$n->couaddress($couname);
$coupayment=$n->coupayment($couname);
$coucontact='+92'.$n->coucontact($couname);
  
}

$totalbill=$total+$coupayment;
if($totalbill>=$reciveamount)
{
  $payment=$totalbill-$reciveamount;
  $n->updatepayment($couname,$payment);
}
else
{
  $payment=0;
  $n->updatepayment($couname,0);

}



























//pdf

   ob_start();
 
$pdfs =new FPDF('P','mm',array(80,200));
 $pdfs->AddPage();
//image set from here
 $pdfs->Image("img\logo.jpg",2,2,75,35);
 

//sell cet from here
$pdfs->Cell(22,50,'',0,1);
if( $billtype == "on Retail")
{

$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(0,6,'',0,1);
$pdfs->Cell(-2,6,'',0,0);
$pdfs->Cell(9,-46,'Bill To:',0,0);// here adjust bill by 2nd value landscape
$pdfs->SetFont('Arial','','8');

$pdfs->Cell(-9,-46,$couname,0,0); // here adjust customer name by 2nd value potrait..........by first value adjust invoice id landscape
$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(30,-37,'#Invoice Id',0,0); // here adjust invoice id by 2nd value potrait
$pdfs->SetFont('Arial','','8');
$pdfs->Cell(40,-37,$tid,0,1);





$pdfs->Cell(-2,-60,'',0,0);//here adjust date landscape
$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(22,45,'Date:',0,0);// here adjust date potrait
$pdfs->SetFont('Arial','','8');
$x= date("d-m-y");
$pdfs->Cell(-66,46,$x,0,1);// here adjust date value potrait
}

else
{


$pdfs->SetFont('Arial','B','12');
$pdfs->Cell(22,6,'',0,1);
$pdfs->Cell(30,6,'',0,0);
$pdfs->Cell(20,6,'Bill To',0,0);
$pdfs->SetFont('Arial','','12');
$pdfs->Cell(65,6,$couname,0,0);
$pdfs->Cell(10,6,'',0,0);

$pdfs->SetFont('Arial','B','12');
$pdfs->Cell(30,6,'#Invoice No',0,0);
$pdfs->SetFont('Arial','','12');
$pdfs->Cell(40,6,$tid,0,1);













$pdfs->SetFont('Arial','B','12');
$pdfs->Cell(30,6,'',0,0);
$pdfs->Cell(20,6,'Address',0,0);
$pdfs->SetFont('Arial','','12');
$pdfs->Cell(65,6,$couaddress,0,0);
$pdfs->Cell(10,6,'',0,0);






$pdfs->SetFont('Arial','B','12');
$pdfs->Cell(15,6,'Date',0,0);
$pdfs->SetFont('Arial','','12');
$x= date("d-m-Y");
$pdfs->Cell(40,6,$x,0,1);





$pdfs->SetFont('Arial','B','12');
$pdfs->Cell(30,6,'',0,0);
$pdfs->Cell(20,6,'Contact ',0,0);
$pdfs->SetFont('Arial','','12');
$pdfs->Cell(40,6,$coucontact,0,0);
$pdfs->Cell(10,6,'',0,1);





}



$pdfs->Cell(12,-19,'',0,1);// here cell adjust potrail
//cell set from here
$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(-8,8,'',0,0);// here cell no quantity etc adjust by landscape
$pdfs->Cell(6,4,'No',1,0);
$pdfs->Cell(30,4,'Item Description',1,0, 'C');
$pdfs->Cell(12,4,'Qty',1,0, 'C');
$pdfs->Cell(13,4,'Per Item ',1,0, 'C');
$pdfs->Cell(13,4,'Total',1,1, 'C');

$totalsuit =0;


for($count= 0 ; $count< count($names);$count++)
{

$totalsuit = $totalsuit + $quantitys[$count];

$pdfs->SetFont('Arial','','7');
$no =$count+1;
$pdfs->Cell(-8,8,'',0,0);// here adjust cell value 5200
$pdfs->Cell(6,4,$no,1,0);



$pdfs->SetFont('Arial','','7');
$pdfs->Cell(30,4,$names[$count],1,0);
$pdfs->SetFont('Arial','','7');
$pdfs->Cell(12,4,$quantitys[$count],1,0, 'C');
$pdfs->Cell(13,4,$prices[$count],1,0, 'C');



$pdfs->Cell(13,4,$tbls[$count],1,1,'C');


}

$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(25,9,'TotalSuit:',0,0);// here adjust tatal all value by 2ns potrait
$pdfs->Cell(70,86,'',0,0);
$pdfs->Cell(-70,12,'Total:',0,0);// here adjust 5200 landscape by 1st value
$pdfs->SetFont('Arial','','7');
$pdfs->Cell(66,8,$totalsuit,0,1);
//total set from here
$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(25,9,'Total:',0,0);// here adjust tatal all value by 2ns potrait
$pdfs->Cell(70,86,'',0,0);
$pdfs->Cell(-70,12,'Total:',0,0);// here adjust 5200 landscape by 1st value
$pdfs->SetFont('Arial','','7');
$pdfs->Cell(66,8,$total,0,1);






if( $billtype == "on Retail")
{

  $pdfs->SetFont('Arial','B','7');
  $pdfs->Cell(70,7,'Discount:',0,0);
  $pdfs->Cell(-45,5,'Discount :',0,0);
  $pdfs->SetFont('Arial','','7');
  $discountamount=(string)$discountamount;
  $pdfs->Cell(40,6,$discountamount,0,1);
  

  $pdfs->SetFont('Arial','B','7');
$pdfs->Cell(70,7,'Total:',0,0);
$pdfs->Cell(-45,6,'Total :',0,0);
$pdfs->SetFont('Arial','','7');
$discountamount= $total -$discountamount;
$discountamount=(string)$discountamount;
$pdfs->Cell(40,6,$discountamount,0,1);



  $pdfs->SetFont('Arial','B','7');
$pdfs->Cell(70,6,'Recieved Cash:',0,0);
$pdfs->Cell(-45,6,'Received Cash:',0,0);
$pdfs->SetFont('Arial','','7');

$pdfs->Cell(100,6,$reciveamount,0,1);





$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(70,6,'Return Cash:',0,0);
$pdfs->Cell(-44,6,'Return Cash:',0,0);
$pdfs->SetFont('Arial','','7');
$pdfs->Cell(80,6,$returnamount,0,1);












}
else
{


$pdfs->SetFont('Arial','B','10');
$pdfs->Cell(70,6,'',0,0);
$pdfs->Cell(35,6,'Previous Amount',0,0);
$pdfs->SetFont('Arial','','10');
$pdfs->Cell(40,6,$coupayment,0,1);



$s =$total+$coupayment;
$to=(string)$s;
$pdfs->SetFont('Arial','B','10');
$pdfs->Cell(70,6,'',0,0);
$pdfs->Cell(35,6,'Total Amount',0,0);
$pdfs->SetFont('Arial','','10');
$pdfs->Cell(40,6,$to,0,1);



$pdfs->SetFont('Arial','B','10');
$pdfs->Cell(70,6,'',0,0);
$pdfs->Cell(35,6,'Received Cash',0,0);
$pdfs->SetFont('Arial','','10');
$pdfs->Cell(40,6,$reciveamount,0,1);

$to=(string)$payment;

$pdfs->SetFont('Arial','B','10');
$pdfs->Cell(70,6,'',0,0);
$pdfs->Cell(35,6,'Remaining Amount',0,0);
$pdfs->SetFont('Arial','','10');
$pdfs->Cell(40,6,$payment,0,1);

if($reciveamount>$totalbill)
{
  $pdfs->SetFont('Arial','B','10');
$pdfs->Cell(70,6,'',0,0);
$pdfs->Cell(35,6,'Return Cash',0,0);
$pdfs->SetFont('Arial','','10');
$returncash=$reciveamount-$totalbill;
$returncash=(string)$returncash;
$pdfs->Cell(40,6,$returncash,0,1);



$pdfs->SetFont('Arial','B','10');
$pdfs->Cell(70,6,'',0,0);
$pdfs->Cell(35,6,'Discount :',0,0);
$pdfs->SetFont('Arial','','10');
$discountamount=(string)$discountamount;


$pdfs->Cell(40,116,$discountamount,0,1);




}









}


$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(-6,2,'',0,0);
$pdfs->Cell(55,20,'Thanks For your Visit',0,0);
date_default_timezone_set("Asia/Karachi");
$x =  date("h:i:sa");
$pdfs->SetFont('Arial','B','8');
$pdfs->Cell(50,20,$x,0,1);






$pdfs->SetFont('Arial','B','7');
$pdfs->Cell(-6,2,'',0,0);
$pdfs->Cell(55,-9,'Ph# 0333-4295110',0,1);






$pdfs->Output();
ob_end_flush(); 

 
















































}

?>


