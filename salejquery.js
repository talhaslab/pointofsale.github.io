

function minusdiscount()
{
	
	  var val=$("#discounted").val();
		 
		 
		 console.log(val);
		 var grandtoatal = $('#totalbill').html(); 
		  
	    grandtoatal = parseInt(	 grandtoatal);
		 
		 if(val<=grandtoatal)
		  {
			  console.log("in if");
		   var remamount=grandtoatal-val;
		  
		   $("#discounts").val(remamount);
		  }
	
	
}

 
$(document).ready(function(){


	$('#Coustmername').val("The Walking Costumer");
         
           
  
   var recive='Discount <input type="number" min=0 onkeyup="minusdiscount()" id="discounted">';
   $("#discount").html(recive);
		   









          $('#Coustmername').typeahead({
		 

		  source: function(query, result)
		  {

           $.ajax({
			url:"autocomplete.php",
			method:"POST",
			data:{
				cou:1,
				query:query},
			dataType:"json",
			success:function(data)
			{
			 result($.map(data, function(item){
	               

                  if($('#Billtype').val()=="on Wholesale")
                  {

      			  return item;
      			}
			  
			 }));
			}
		   })
		  }
		
		 });

     


       








    












    function addtable()
    {
       
	   var x=$("#name").val();
              var y=$("#quantity").val();
              var z=$("#price").val();
              if(x !='' && y != '' && z != '')
              {
				  				  
                var row ='<tr><td class="name">'+x+' </td>  <td class="quantity"> '+y+' </td>     <td class="price">'+z+' </td>  <td class="tbl">'+(y*z)+' </td>   </tr>';
                
				
				$('tbody').append(row);
                
				
				
				$("#name,#quantity,#price").val('');
                   var grandtoatal=0;
                $(".tbl").each(function()
                {

                   grandtoatal += parseFloat($(this).html());

                });
                
                $("#totalbill").html(grandtoatal);
                var recive='Recived amount <input type="number" min=0 id="reciveamount">';
                $("#recamount").html(recive);
                  $("#reciveamount").change(function(){

                       var val=$("#reciveamount").val();
					 var   grandtoatal =$('#discounts').val();        
					   if(val>=grandtoatal)
                       {
                        var remamount=val-grandtoatal;
                       
                        $("#remamount").html(remamount);
                       }
                  });
				  }

              
    }
	function quantity( data )
	{
		if(data==1)
		{
		$('#quantity').val("");
		$('#price').val("");
		alert("Invalid Quantity");
		
		}
		
	}
	
	function setquantity()
	{
		var query= $('#name').val();
		var qun=$('#quantity').val();
		
		if(qun<0)
		{
			$('#quantity').val("");
			
		}
		
		
		$.ajax({  
                     url:"autocomplete.php",  
                     method:"POST",  
                     data:{
						 quantity:qun,
						 query:query,
						},  
                     success:function(data)  
                     {      
					 
							let row = JSON.parse(data);
							price = row[1];
							$('#price').val(price);								 


							}  
                }); 
		
		
		
	}


	function validcoustmer(data)
	{


		if(data==1)
		{
			  $('#name').val("");
		      $('#quantity').val("");
		      $('#price').val("");
		      $('#Coustmername').val("");
			alert("Coustmer name not valid.........");
            
		}
	}
	
	  
 	  function setcoustmer()
 	  {
           
           if($('#Coustmername').val()=="")
           {
           	alert("Plz Enter Coustmer name");
             $('#name').val("");
		     $('#quantity').val("");
		     $('#price').val("");    	
           }
           
           if($('#Billtype').val()=="on Wholesale")
           {

           	 var name =$('#Coustmername').val();

             //start

             $.ajax({  
                     url:"autocomplete.php",  
                     method:"POST",  
                     data:{
						 coustmer:1,
						 name:name},  
                     success:function(data)  
                     {      
					 
                        	validcoustmer(data);								
                            								 


							}  
                }); 
		














           	 //end
           }


 	  }

	 


      $("#price").keypress(function(event)
      {
              	setquantity();
              	if ($('#price').val()<0)
              	{
              	  $('#price').val("");	
              	}
                setcoustmer();


          if(event.which==13)
          {
             
              addtable();
          }


      });
        
        $("#submit").click(function(){

          addtable();
        });

             
		$('#name').typeahead({
		  source: function(query, result)
		  {
		   $.ajax({
			url:"autocomplete.php",
			method:"POST",
			data:{
				search:1,
				query:query},
			dataType:"json",
			success:function(data)
			{
			 result($.map(data, function(item){
			  
			  return item;
			  
			 }));
			}
		   })
		  }
		 });
		 /// From this save procedure is start
		 function insert ()
		 {
			 var name =[];
			 var quantity=[];
			 var  price=[];
			 var tbl=[];
			 var total=	$('#totalbill').html();
			 var discounttotal = $('#discounts').val();
			var reciveamount=$('#reciveamount').val();
			 var billtype=$('#Billtype').val();
			 var couname =$('#Coustmername').val();
			var returnamount=reciveamount-total;
			  total =parseInt(discounttotal);
			 
			  $('.name').each(function(){
				  name.push($(this).text());
				  });
			 $('.quantity').each(function(){
				  quantity.push($(this).text());
				  });
			 $('.price').each(function(){
				  price.push($(this).text());
		 		  });
			 $('.tbl').each(function(){
				  tbl.push($(this).text());
		 		  });

			 
		   $.ajax({
			 url:"autocomplete.php",
			 method:"POST",
			 data:{
				 insert:1,
				 name:name,
				 price:price,
				 quantit:quantity,
				 tbl:tbl,
				 total:total,
				 billtype:billtype,
				 couname:couname,
				 reciveamount:reciveamount},
			 success:function(data)
			 {

				var total=	$('#totalbill').html();
	              total=  parseInt(total);
                    discounttotal = parseInt(discounttotal);    			 		
				window.location.href = "invoice.php?name[]="+name+"&insert=1&price[]="+price+"&quantity[]="+quantity+"&tbl[]="+tbl+"&total="+total+"&discount="+discounttotal +"&couname="+couname+"&reciveamount="+reciveamount+"&returnamount="+returnamount+"&tid="+data+"&billtype="+billtype;
			

			 } 
			 
			 
			 
		 });		  
		
        
            










		 	  
		 }
		 
		 
		 
		 
		 
		 
		 
		 $('#save').click(function(){
			 
		 var check=	$('#totalbill').html();
           var reciveamount=$('#reciveamount').val();
            if (check != '' && reciveamount != '' )
			{
				
			  insert();	
				
				
				
			}				
			 
			 
			 
			 
		 });




	});