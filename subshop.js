      $(document).ready(function(){

         
        if($('#totalsale').val() != ' ' )
        {


         

          $.ajax({  
                     url:"autocomplete.php",  
                     method:"POST",  
                     data:{
						 cash:1},  
                     success:function(data)  
                      {      
					 
                        									
                  $('#alreadyrecivedcash').val(data);
                   var rec  =$('#totalsale').val()-data;
                          $('#ReciveableCash').val(rec);      
							}  
                }); 
		      
  



        }


               $("#save").click(function(){
                 insertrecord();          });


         


      function insertrecord()
      {

                

               var reciveablecash=($('#ReciveableCash').val());
               var totalexpens= $('#totalexpences').val() 
                 
		      
  
                	
		$.ajax({  
                     url:"autocomplete.php",  
                     method:"POST",  
                     data:{
						 reciveablecash:reciveablecash,
						 totalexpens:totalexpens},  
                     success:function(data)  
                     {      
					 
                       	$('#notifications').html(data);								
                            								 
                            $( "#notifications" ).fadeOut( "slow" );
                            
   				           window.location.href="subshop.php"				
                            								 


							}  
                }); 
		
	


      }



       $('#totalexpences').keyup(function(){
          
       if($('#totalexpences').val()>=0)
       {
           
           var plus =parseInt($('#totalexpences').val())+parseInt($('#alreadyrecivedcash').val());
           if(plus<parseInt($('#totalsale').val()))
           {
           var recived=parseInt($('#totalsale').val())-plus;
            
            $('#ReciveableCash').val(recived);
           }
           else
           {
           	$('#totalexpences').val("");

           }
       }
       

         


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
						 query:query},  
                     success:function(data)  
                     {      
					 
                        	quantity(data);								
                            								 


							}  
                }); 
		
		
		
	}



     function quantity( data )
	{
		if(data==1)
		{
		$('#quantity').val("");
		$('#name').val("");
		alert("Invalid Quantity");
		
		}
		else
		{
			insert();
		}
		
	}
	



        function insert()
        {

        var qun=	$('#quantity').val();
	   var name=	$('#name').val();


        if(name != '' && qun != '')
        {
           

             $.ajax({  
                     url:"autocomplete.php",  
                     method:"POST",  
                     data:{
						 quanti:qun,
						 name:name
						 },  
                     success:function(data)  
                     {      
					 
                        	$('#notification').html(data);								
                            								 
                            $('#quantity').val("");
	                     	$('#name').val("");
                            $( "#notification" ).fadeOut( "slow" );
                            

							}  
                }); 
		
		
        	
        }

        }











             $("#quantity").keypress(function(event)
      {
              	
              	if ($('#quantity').val()<0)
              	{
              	  $('#quantity').val("");	
              	}
                
          if(event.which==13)
          {
             
          setquantity();
          }


      });
        
        $("#submit").click(function(){
                 setquantity();          });



        
























		});