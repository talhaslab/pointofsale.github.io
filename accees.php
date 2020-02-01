f<?php
error_reporting(0);

 class Connection  
{
	
	
   
     public  $conn;  

    public	function __construct()
	   {        
				 $this->server="localhost";
		        $this->username="root";
		        $this->password="";
		         $this->dbname="myfyp";
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->dbname);
				if ($this->conn->connect_error)
				{
					die ($this->conn->connect_error);
				}
		
	    }
		
		public function addexpense($name,$price)
		{
          $sql="INSERT INTO `tbl_expense` ( `expense_name`, `price`, `Date`, `Time`) VALUES ( '$name', '$price', CURRENT_DATE(), CURRENT_TIME())";
         $result = $this->conn->query($sql);
         if($result)
         {
         	return "Yes";
         }
          else{
          	return "No";
          }
       }
  public function runcash($price)
  {
  	$sql="INSERT INTO `tbl_subshopcash` ( `Amount`, `Date`, `Time`) VALUES ('$price', CURRENT_DATE(), CURRENT_TIME())";
  
                $result = $this->conn->query($sql);
  

             if($result)
         {
         	return "Yes";
         }
          else{
          	return "No";
          }
  



  }






		public function autocomplete($q)
		{
			$query= "SELECT * FROM `tbl_product` WHERE pro_name LIKE '%$q%'";
			$result = $this->conn->query($query);
			$output =array();
			if ($result->num_rows>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					 $output[] = $row["pro_name"];
				}
			}
						   return $output;
		}


       public function autocompletes($q)
		{
			$query= "SELECT * FROM `tbl_supplier` WHERE sup_name LIKE '%$q%'";
			$result = $this->conn->query($query);
			$output =array();
			if ($result->num_rows>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					 $output[] = $row["sup_name"];
				}
			}
						   return $output;
		}




         public function completecou($q)
		{
			$query= "SELECT * FROM `tbl_coustmer` WHERE cou_name LIKE '%$q%'";
			$result = $this->conn->query($query);
			$output =array();
			if ($result->num_rows>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					 $output[] = $row["cou_name"];
				}
			}
						   return $output;
		}





		public function quantity($q)
		{
			$query= "SELECT pro_quantity,pro_peritemprice FROM tbl_product WHERE pro_name ='$q'";
			$result = $this->conn->query($query);
			$output=0;
			if($result->num_rows>0)
			{

				$output =mysqli_fetch_row($result);
			}
			return $output;
		}
}


class supplier extends Connection
{

	      

             public function supplierid($name)
				 {
						 $sql="SELECT sup_id FROM `tbl_supplier` WHERE sup_name='$name'";
					 $result=$this->conn->query($sql);
					 
					 
					 $row =mysqli_fetch_array($result);
					 return $row['sup_id'];
					 
					 
				 }


                 public function addinstallment($name,$price)
	          {
                           
                           	 $sql="SELECT sup_id FROM `tbl_supplier` WHERE sup_name='$name'";
					 $result=$this->conn->query($sql);
					 
					 
					 $row =mysqli_fetch_array($result);
					 $id= $row['sup_id'];
					 
                     	 $sql="SELECT sup_payment FROM `tbl_supplier` WHERE sup_name='$name'";
				
                            $result=$this->conn->query($sql);
                                $row =mysqli_fetch_array($result);
					            $amount=$row['sup_payment'];
					            $amount=$amount-$price;

					            if ($amount>=$price)
					            {

					 $sql="UPDATE `tbl_supplier` SET `sup_payment` = '$amount' WHERE sup_name = '$name'"; 
					  $result=$this->conn->query($sql);     

					  $sql ="INSERT INTO `sup_installments` ( `sup_id`, `price`, `Date`, `Time`) VALUES ( '$id', '$price', CURRENT_DATE(), CURRENT_TIME())";
                      $result=$this->conn->query($sql);
                      return "Yes";
                      }
                      return "no";       


	          }



           public function validsupplier($name)
				 {
					 $sql="SELECT sup_name FROM `tbl_supplier` WHERE sup_name='$name'";
					 $result=$this->conn->query($sql);
					 
					   if($result->num_rows>0)

					   {
					   	return true;
					   }
					   else
					   {
                           return false;
					   }					 
					 
				 }


		public	function supamount($supname,$total)
		{
                 	 $sql="SELECT sup_payment FROM `tbl_supplier` WHERE sup_name='$supname'";
				
                            $result=$this->conn->query($sql);
                                $row =mysqli_fetch_array($result);
					            $amount=$row['sup_payment'];
					            $amount=$amount+$total;

					 $sql="UPDATE `tbl_supplier` SET `sup_payment` = '$amount' WHERE sup_name = '$supname'"; 
					  $result=$this->conn->query($sql);          
		}


}




class costumer extends Connection
{

      public function validcoustmer($name)
				 {
					 $sql="SELECT * FROM `tbl_coustmer` WHERE cou_name='$name'";
					 $result=$this->conn->query($sql);
					 
					   if($result->num_rows>0)

					   {
					   	return true;
					   }
					   else
					   {
                           return false;
					   }					 
					 
				 }

      public function couaddress($name)
				 {
						 $sql="SELECT * FROM `tbl_coustmer` WHERE cou_name='$name'";
					     

					 $result=$this->conn->query($sql);
					 
					 
					 $row =mysqli_fetch_array($result);
					 
                     
                     
                    return $row['cou_address'];


					 
					 
					 
				 }

     public function coupayment($name)
				 {
						 $sql="SELECT cou_payment FROM `tbl_coustmer` WHERE cou_name='$name'";
					 $result=$this->conn->query($sql);
					 
					 
					 $row =mysqli_fetch_array($result);
					 
                     
                     
                    return $row['cou_payment'];


					 
					 
					 
				 }

 public function coucontact($name)
				 {
						 $sql="SELECT cou_contact FROM `tbl_coustmer` WHERE cou_name='$name'";
					 $result=$this->conn->query($sql);
					 
					 
					 $row =mysqli_fetch_array($result);
					 
                     
                     
                    return $row['cou_contact'];


					 
					 
					 
				 }
public function updatepayment($name,$payment)
      {


               $sql="UPDATE `tbl_coustmer` SET `cou_payment` = '$payment' WHERE cou_name='$name'";
               $result=$this->conn->query($sql);
					 



      }


}





class item extends Connection
			  {
				 protected $item;
				 
				 public function searchitem($name)
				 {
						 $sql="SELECT pro_id FROM `tbl_product` WHERE pro_name='$name'";
					 $result=$this->conn->query($sql);
					 
					 
					 $row =mysqli_fetch_array($result);
					 return $row['pro_id'];
					 
					 
				 }

				 public function subquantity($q)
		{
		 	$query= "SELECT pro_subquantity FROM tbl_product WHERE pro_name ='$q'";
			$result = $this->conn->query($query);
			$output=0;
			if($result->num_rows>0)
			{
				while($row =mysqli_fetch_assoc($result))
				{
					
					$output= $row['pro_subquantity'];
					
				}
				
			}
			return $output;
		}


                  public function validitem($name)
				 {
					 $sql="SELECT pro_id FROM `tbl_product` WHERE pro_name='$name'";
					 $result=$this->conn->query($sql);
					 
					   if($result->num_rows>0)

					   {
					   	return true;
					   }
					   else
					   {
                           return false;
					   }					 
					 
				 }


				  public function serchquantity($id)
				  {
					  $sql="SELECT pro_quantity FROM `tbl_product` WHERE pro_id='$id'";
					 $result=$this->conn->query($sql);
					 
					 
					 $row =mysqli_fetch_array($result);
					 return $row['pro_quantity'];
					  
				  }
				

				public function updatequantity($name,$quantity)
				{

                    $id = $this->searchitem($name);
                    $actualquantity  = $this->serchquantity($id);
                    $proquantity=$actualquantity-$quantity;
                   $sql= "SELECT pro_subquantity FROM `tbl_product` WHERE pro_id='$id'";
                    $result=$this->conn->query($sql);
                        $row =mysqli_fetch_array($result);
					  $quantity =  $row['pro_subquantity']+$quantity;



                    $sql="UPDATE `tbl_product` SET `pro_quantity` = '$proquantity', `pro_subquantity` = '$quantity' WHERE `pro_id` = '$id'";
                      

                      $result=$this->conn->query($sql);
                      if($result)
                      {
                      	return true;
                      }
                      else
                      {
                      	return false;
                      }

				}  
				  

				  public function returnproduct($id)
				  {

                     $sql="SELECT * FROM `tbl_salelineitem` WHERE id = ' ".$id."'";
                       $result=$this->conn->query($sql);
                        $row =mysqli_fetch_array($result);

                        if($row['pro_quantity']>=1)
                        {
                        	//$q=$row['pro_quantity']-1;
                        	//$sql1="UPDATE `tbl_salelineitem` SET `pro_quantity` = '$q' WHERE `tbl_salelineitem`.`id` = '$id'";
                             $id=$row['pro_id'];
							
							$priceofproduct = $row['pro_price'];
							
							
                            
                               $sql5="SELECT * FROM `tbl_product` WHERE pro_id='$id'";
                              $result5=$this->conn->query($sql5); 
                              $rows1 =mysqli_fetch_array($result5);
                              $qua=$rows1['pro_quantity']+1;


                        	$sql2="UPDATE `tbl_product` SET `pro_quantity` = '$qua' WHERE `tbl_product`.`pro_id` = '$id'";
                        	$priceminus=$row['pro_price'];
                        	$tid=$row['pro_transactionId'];
                        	 $result2=$this->conn->query($sql2);
                              
							// $sql3="SELECT * FROM `tbl_transaction` WHERE id='$tid'";
                        	  // $result3=$this->conn->query($sql3);
                              // $rows =mysqli_fetch_array($result3);

                              // $peramount=$rows['amount']-$priceminus;
                           // $sql4  ="UPDATE `tbl_transaction` SET `amount` = '$peramount' WHERE `tbl_transaction`.`id` = '$tid'"; 
                              // $result1=$this->conn->query($sql1);
                              // $result4=$this->conn->query($sql4);

                              $sql6="INSERT INTO `tbl_returnproduct` ( `pro_id`, `amount`, `quantity`, `date`, `time`) VALUES ( '$id', '$priceminus', '1', CURRENT_DATE(), CURRENT_TIME())";
                               $result6=$this->conn->query($sql6);


                       
                        }

					return true;

				  }
			  }


             class purchases extends Connection
             {

                
                public function purchasesid($name,$paymenttype,$total)
                {
                    $x= new supplier;
                    $supid= $x->supplierid($name);  

                    session_start();
                    $userid= $_SESSION['id'];
                    $sql="INSERT INTO `tbl_purchases` ( `sup_id`, `date`, `time`, `view`, `userid`, `paymenttype`,`total`) VALUES 
                        ( '$supid', CURRENT_DATE(), CURRENT_TIME(), '0', '$userid', '$paymenttype','$total')";
                    $x= $this->conn->query($sql);
                     $id =$this->conn->insert_id;
                      return $id;		

                }
                 public function purchaselineitem($name,$price,$quantity,$tid)
                 {    $sql ="";
					   $sql1="";
						 					 
					 for($count= 0 ; $count< count($name);$count++)
					 {
					    $item =new item;
					    $id = $item->searchitem($name[$count]);
                        $qun=$item->serchquantity($id);
						$q= intval($quantity[$count]);
						
                        $qun = $qun +$q ;
						
  						
						$sql.="INSERT INTO `purchaselineitem` ( `pro_id`, `pro_quantity`, `pro_price`, `purchase_id`) VALUES ( '$id', 
						'$quantity[$count]', '$price[$count]', '$tid');
 UPDATE `tbl_product` SET `pro_quantity` = '$qun',pro_peritemprice='$price[$count]',pro_dateofarrival=CURRENT_DATE()  WHERE pro_name = '$name[$count]';";
                        
											  
		               }
						 
						 $result=$this->conn->multi_query($sql);
					if(  $result  )
					   {
						   return 1;

						   					   }						   
					   else
					   {
						   return 0;

					   }


                 }
                




               }




             






  
             class sale extends Connection
			 {
				 
				 protected $name; 
				 Protected $quantity;
				 Protected $price; 
				 protected $total;
				 public function transaction($total)
				 { 
				    $sql= "INSERT INTO `tbl_transaction` ( amount, time, date) VALUES ( '$total', CURRENT_TIME(), CURRENT_DATE())";
                     $x= $this->conn->query($sql);
                     $id =$this->conn->insert_id;
                      return $id;					 
					 
				 }

				 public function subtransaction($total)
				 {

				    $sql= "INSERT INTO `tbl_subtransaction` ( amount, time, date) VALUES ( '$total', CURRENT_TIME(), CURRENT_DATE())";
                     $x= $this->conn->query($sql);
                     $id =$this->conn->insert_id;
                      return $id;					 
					


				 }
				 public function subrecords($expense,$recivedcash)
				 {

                    $sql="INSERT INTO `subshopexpense` ( `date`, `time`, `expenseamount`, `recivedcash`) VALUES ( CURRENT_DATE(), CURRENT_TIME(), '$expense', '$recivedcash');";
                      $result= $this->conn->query($sql);
                     if($result)
                     {
                     	return true;
                     
                     }
                     else
                     {
                     	return false;
                     }



				 }
				 public function sublineitem($name,$quantity,$price,$tid)
				 {
				 	   $sql ="";
					   $sql1="";
						 					 
					 for($count= 0 ; $count< count($name);$count++)
					 {
					    $item =new item;
					    $id = $item->searchitem($name[$count]);
                        $qun=$item->subquantity($name[$count]);
						$q= intval($quantity[$count]);
						
                        $qun = $qun -$q ;
						
  						
						$sql.="INSERT INTO `tbl_sublineitem` (`pro_id`, `pro_quantity`, `pro_price`, `pro_transactionId`) VALUES ( '$id', '$quantity[$count]', '$price[$count]', '$tid');
						    UPDATE `tbl_product` SET `pro_subquantity` = '$qun' WHERE pro_name = '$name[$count]';";
                        
											  
		                 }
						 
						 $result=$this->conn->multi_query($sql);
					if(  $result  )
					   {
						   return 1;

						   					   }						   
					   else
					   {
						   return 0;

					   }
				 

				 }
				 
				 
				 
				 public function lineitem($name,$quantity,$price,$tid)
				 {
					 
					   $sql ="";
					   $sql1="";
						 					 
					 for($count= 0 ; $count< count($name);$count++)
					 {
					    $item =new item;
					    $id = $item->searchitem($name[$count]);
                        $qun=$item->serchquantity($id);
						$q= intval($quantity[$count]);
						
                        $qun = $qun -$q ;
						
  						
						$sql.="INSERT INTO `tbl_salelineitem` (`pro_id`, `pro_quantity`, `pro_price`, `pro_transactionId`) VALUES ( '$id', '$quantity[$count]', '$price[$count]', '$tid');
						    UPDATE `tbl_product` SET `pro_quantity` = '$qun' WHERE pro_name = '$name[$count]';";
                        
											  
		                 }
						 
						 $result=$this->conn->multi_query($sql);
					if(  $result  )
					   {
						   return 1;

						   					   }						   
					   else
					   {
						   return 0;

					   }
				 



				 }
				 
				 
	        		 }
			  

      

    class access extends Connection
			{
				   protected  $username;
				   protected $password;
				   protected $access;


			                public function login($usernames,$passwords )
			                {
			                      
			                    $sql="";
			                    
			                    $sql.="Select * from tbl_user where colUsername='".$usernames."' and colUserPassword= '". $passwords ."'";
			                    $ex= $this->conn->query($sql);
			                    if($ex->num_rows>0)
			                    {

			                      
                                    $this->access= "OK";
                                    echo $this->access;
                                    $row=mysqli_fetch_array($ex);
                                    session_start();
                                    $_SESSION['id']=$row['ColUserID'];
                                      if($row['colUserRole']=="Owner")
                                      {
                                     header("Location:index1.php"); }
                                     else
                                     {
                                     	header("Location:sale.php"); 
                                     }
			                    }
			                    else 
			                    {
			                    	echo "Not ok";
			                    }

			                    }


			                    public function getrole($id)
			                    {

                                         $sql="";
			                    
			                    $sql.="Select colUserRole from tbl_user where ColUserID ='$id'";
			                    $ex= $this->conn->query($sql);
			                    if($ex->num_rows>0)
			                    {
                                     $row=mysqli_fetch_array($ex);


                                        return $row['colUserRole']; 
                                              

                                  }

			                    }




				
			}


             class reports extends Connection 
             {
                  public $todaysale;
                  public $cash;
                  public $expense;
                  public $lessstock;
                  public $totalsale;
                  public $costofgoods;
                  public $expences;
				  public $recales;
                  public $subshopexpense;
                  public $profit;
                  public $branchtotalsale;
                   public $costofgoodsbranch;
                   public function sale() 
                   {
                   	 $sql="SELECT sum(amount) as sale FROM `tbl_transaction` WHERE date= CURRENT_DATE()";
                       $result=$this->conn->query($sql);
                       if($result)
                       	 {
                       	 	$x=mysqli_fetch_array($result);
                       	 	$this->todaysale =$x['sale'];
                       	 	return number_format($this->todaysale);
                       	 }

                   }
                
                   public function stockalert()
                   {

                          $sql="SELECT count(pro_id) as lessstock from tbl_product where pro_quantity < 2";
                       $result=$this->conn->query($sql);
                       if($result)
                       	 {
                       	 	$x=mysqli_fetch_array($result);
                       	 	$this->lessstock =$x['lessstock'];
                       	 	return $this->lessstock;

                       	 }


                   }
                   public function shopcashrecived()
                   {


                               $sql="SELECT sum(Amount) as total from tbl_subshopcash WHERE Date=CURRENT_DATE()";
                       $result=$this->conn->query($sql);
                       if($result)
                       	 {
                       	 	$x=mysqli_fetch_array($result);
                       	 	return $x['total'];

                       	 }

                      }
                  
                  public function incomestament()
                  {
                     $this->costofgoods=0;
                      $this->totalsale=0;
                  	$sql="SELECT pro_id,sum(pro_quantity) as quantity , sum(pro_price * pro_quantity) as price FROM tbl_salelineitem WHERE pro_transactionId IN(SELECT id from tbl_transaction where date = CURRENT_DATE()) GROUP BY pro_id";
                  	  $result=$this->conn->query($sql);
                     if($result->num_rows>0)
			            {
				             while($row =mysqli_fetch_assoc($result))
				            {
				            	$quantity =$row['quantity'];
				            	$id =$row['pro_id'];
				            	$sql ="SELECT pro_peritemprice*'$quantity' as cost from tbl_product where pro_id = '$id'";
				            	$results=$this->conn->query($sql);
					            $rows =mysqli_fetch_array($results);
                                 $this->costofgoods += $rows['cost'];
                                 $this->totalsale += $row['price'] ;  
				            }
				
			            }
			            
                     
                     $sql="SELECT pro_id,sum(pro_quantity) as quantity , sum(pro_price * pro_quantity) as price FROM tbl_sublineitem WHERE pro_transactionId IN(SELECT id from tbl_subtransaction where date = CURRENT_DATE()) GROUP BY pro_id";
                      $result=$this->conn->query($sql);
                     if($result->num_rows>0)
			            {
				             while($row =mysqli_fetch_assoc($result))
				            {
				            	$quantity =$row['quantity'];
				            	$id =$row['pro_id'];
				            	$sql ="SELECT pro_peritemprice*'$quantity' as cost from tbl_product where pro_id = '$id'";
				            	$results=$this->conn->query($sql);
					            $rows =mysqli_fetch_array($results);
                                 $this->costofgoodsbranch += $rows['cost'];
                                 $this->branchtotalsale += $row['price'];  
				            }
				
			            }
			            else
			            {
                                    $this->costofgoodsbranch=0;
                                    $this->branchtotalsale=0;
			            }
                     

                     
                  }

 public function resales()
                {
                	 $sql="SELECT SUM(price) as resale FROM `tbl_resale` WHERE Date= CURRENT_DATE()";
                      $result=$this->conn->query($sql);
                      if($result->num_rows>0)
                      {
                              $row =mysqli_fetch_array($result);
                              $this->recales =$row['resale'];
                      }
                      else
                      {
                              $this->recales =0;	
                      }
                      return $this->recales;
                }







 
                public function expenses()
                {
                	 $sql="SELECT SUM(price) as expense FROM `tbl_expense` WHERE Date= CURRENT_DATE()";
                      $result=$this->conn->query($sql);
                      if($result->num_rows>0)
                      {
                              $row =mysqli_fetch_array($result);
                              $this->expences =$row['expense'];
                      }
                      else
                      {
                              $this->expences =0;	
                      }
                      return $this->expences;
                }

               public function subshopexpense()
                {
                	 $sql="SELECT sum(expenseamount) as expense FROM subshopexpense where date =CURRENT_DATE()";
                      $result=$this->conn->query($sql);
                      if($result->num_rows>0)
                      {
                              $row =mysqli_fetch_array($result);
                              $this->subshopexpense =$row['expense'];
                      }
                      else
                      {
                                  $this->subshopexpense ="null";	
                      }
                      return $this->subshopexpense;
                }                 






                        }



                class profit extends Connection 
                {

                      public  $costofgoods;
                      public  $totalsale;
                      public  $costofgoodsbranch;
                      public  $branchtotalsale;
                      public  $expences;
					  public $recales;
                      public $subshopexpense;
                	public function calprofit($f ,$to)
                	{
                         
                         $this->costofgoods=0;
                         $this->totalsale=0;
                  	$sql="SELECT pro_id,sum(pro_quantity) as quantity , sum(pro_price * pro_quantity) as price FROM tbl_salelineitem WHERE pro_transactionId IN(SELECT id from tbl_transaction where date BETWEEN '".$f ."' and '".$to ."') GROUP BY pro_id";
                  	  $result=$this->conn->query($sql);
                     if($result->num_rows>0)
			            {
				             while($row =mysqli_fetch_assoc($result))
				            {
				            	$quantity =$row['quantity'];
				            	$id =$row['pro_id'];
				            	$sql ="SELECT pro_peritemprice*'$quantity' as cost from tbl_product where pro_id = '$id'";
				            	$results=$this->conn->query($sql);
					            $rows =mysqli_fetch_array($results);
                                 $this->costofgoods += $rows['cost'];
                                 $this->totalsale += $row['price'] ;  
				            }
				
			            }
			            
                            $this->costofgoodsbranch=0;
                            $this->branchtotalsale=0;

                     $sql="SELECT pro_id,sum(pro_quantity) as quantity , sum(pro_price * pro_quantity) as price FROM tbl_sublineitem WHERE pro_transactionId IN(SELECT id from tbl_subtransaction where date BETWEEN '".$f ."' and '".$to ."') GROUP BY pro_id";
                      $result=$this->conn->query($sql);
                     if($result->num_rows>0)
			            {
				             while($row =mysqli_fetch_assoc($result))
				            {
				            	$quantity =$row['quantity'];
				            	$id =$row['pro_id'];
				            	$sql ="SELECT pro_peritemprice*'$quantity' as cost from tbl_product where pro_id = '$id'";
				            	$results=$this->conn->query($sql);
					            $rows =mysqli_fetch_array($results);
                                 $this->costofgoodsbranch += $rows['cost'];
                                 $this->branchtotalsale += $row['price'];  
				            }
				
			            }
			            else
			            {
                                    $this->costofgoodsbranch=0;
                                    $this->branchtotalsale=0;
			            }
                     

                	}

                         

                         public function expenses($from, $to)
                {
                	 $sql="SELECT SUM(price) as expense FROM `tbl_expense` WHERE Date BETWEEN '".$from."' AND '".$to. "'";
                      $result=$this->conn->query($sql);
                      if($result->num_rows>0)
                      {
                              $row =mysqli_fetch_array($result);
                              $this->expences =$row['expense'];
                      }
                      else
                      {
                              $this->expences =0;	
                      }
                      return $this->expences;
                }
				public function resales($from, $to)
                {
                	 $sql="SELECT SUM(price) as resale FROM `tbl_resale` WHERE date BETWEEN '".$from."' AND '".$to. "'";
                      $result=$this->conn->query($sql);
                      if($result->num_rows>0)
                      {
                              $row =mysqli_fetch_array($result);
                              $this->recales =$row['resale'];
                      }
                      else
                      {
                              $this->recales =0;	
                      }
                      return $this->recales;
                }

               public function subshopexpense($from,$to)
                {
                	 $sql="SELECT sum(expenseamount) as expense FROM subshopexpense WHERE date BETWEEN '".$from."' AND '".$to. "'";
                      $result=$this->conn->query($sql);
                      if($result->num_rows>0)
                      {
                              $row =mysqli_fetch_array($result);
                              $this->subshopexpense =$row['expense'];
                      }
                      else
                      {
                                  $this->subshopexpense ="null";	
                      }
                      return $this->subshopexpense;
                }                 
                    


                         }
                   




?>