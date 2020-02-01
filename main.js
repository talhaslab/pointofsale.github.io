$(document).ready(function(){







$("#option").change(function()
	{
                    
         var option =$("#option :selected").val();
         if(option == "Installment Paid" )
         { 
         	$("#names").remove();
         	 $("#input").append('<input type="text" id="names" class="form-control " name="names" autocomplete="off" placeholder="Supplier Name">');

          
                             	        }
	
           if(option == "Expences" )
           {
         	$("#names").remove();
          $("#input").append('<input type="text" id="names" class="form-control " name="names" autocomplete="off" placeholder="Expense Name">');
           }


	});


 
 if($("#option :selected").val()=="Installment Paid")
 {
 $('#names').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"mainacc.php",
    method:"POST",
    data:{query:query},
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



}




$('#price').keyup(function(){


if($('#price').val()<0)
{
   $('#price').val("");	
}



});

//insert

function verify()
{
 var name = $('#names').val();
 var price= $('#price').val();
 var type = $("#option :selected").val();
  var check=0;
  if (type == "Installment Paid" || type=="Expences")
  {
      if(name=="")
      {
      	check=1;
      }
      if(price=="")
      {
      	check=1;
      }
  } 

  return check;

}

function reset()
{

location.reload();  
}







function insert()
{

 var name = $('#names').val();
 var price= $('#price').val();
 var type = $("#option :selected").val();
 var check=0;
   check= verify();



  if(check==0)
  {

 $.ajax({
			 url:"autocomplete.php",
			 method:"POST",
			 data:{
				 
				 name:name,
				 price:price,
				 type:type
				 },
			 success:function(data)
			 {
				 
        
        alert(data);
        reset();  			 } 
			 
			 
			 
		 });		  
			
}
   


}












$('#submit').click(function(){



insert();




});
























           
});