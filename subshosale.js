 
$(document).ready(function(){

         
           


         









        


       








    












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
						 subquantity:qun,
						 subname:query,
						 },  
                     success:function(data)  
                     {      
					 
                        	quantity(data);								
                            								 


							}  
                }); 
		
		
		
	}


	  
 	  

      $("#price").keypress(function(event)
      {
              	setquantity();
              	if ($('#price').val()<0)
              	{
              	  $('#price').val("");	
              	}
             

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
			
			 var total=	$('#totalbill').html();
			
			  total =parseInt(total);
			  $('.name').each(function(){
				  name.push($(this).text());
				  });
			 $('.quantity').each(function(){
				  quantity.push($(this).text());
				  });
			 $('.price').each(function(){
				  price.push($(this).text());
		 		  });
			
			 
		   $.ajax({
			 url:"autocomplete.php",
			 method:"POST",
			 data:{
				 subshop:1,
				 subname:name,
				 subprice:price,
				 subquantit:quantity,
				 subtotal:total
				 },
			 success:function(data)
			 {

	
			 		
	            window.location.href ="subshop.php?total="+total;		

			 } 
			 
			 
			 
		 });		  
		
        
            










		 	  
		 }
		 
		 
		 
		 
		 
		 
		 
		 $('#save').click(function(){
			 
		 var check=	$('#totalbill').html();
           
            if (check != ''  )
			{
				
			  insert();	
				
				
				
			}				
			 
			 
			 
			 
		 });




	});