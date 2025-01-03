
<?php
session_start();
include("db.php");
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:employeelogin.html");
    exit;

}


?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
     <link rel="stylesheet" href="nav.css">


      <title>Billing</title>
      <style>
        .result{
         color:red;
        }
        td
        {
          text-align:center;
        }
        input{
        width: 60px;
        }
      </style>
   </head>
   <body>
   
   <header>
	<!-- navigation bar-->
<ul class="topnav">
  <li><a class="active" href="bills.php">Bill</a></li>
<li><a href="pro_details.php">Product Details</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
	<!-- end of navigation bar-->
</header>
   
      <section class="mt-3">
         <div class="container-fluid">
         <h4 class="text-center" style="color:green">BILLING</h4>
         
         <div class="row">
            <div class="col-md-5  mt-4 ">
               <table class="table" style="background-color:#f5f5f5;">
                  <thead>
                     <tr>
                        
                        <th>Item</th>
                        <th>id</th>
                        <th style="width: 31%">Qty</th>
                        <th>Price</th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                       
                        <td style="width:60%">
                        
                        
                        
                           <select name="vegitable" id="vegitable"  class="form-control">
                              <?php 
                                 $sql = "SELECT * FROM products";
                                 $query = mysqli_query($conn,$sql);
                                 while($row = mysqli_fetch_assoc($query)){
                                 ?>
                                 
                        
                              <option id="<?php echo $row['product_id']; ?>" value="<?php echo $row['product_name']; ?>" class="vegitable custom-select">
                                 <?php echo $row['product_name']; ?>
                              </option>
                              <?php  }?>   
                           </select>
                        </td>
                        
                        <div id="contact_form">
                        <form action="" method="post" name="form1" id="myform">
                        
                        Bill no. <input type="text" name="billno" id="billno" value="1">
                        
                        <td>
                       <input type="text" name="pid" id="pid" >
                       </td>
                        <td style="width:1%">
                          <input type="number" id="qty" name="qty" min="0" value="0" class="form-control">
                        </td>
                        <td>
                           <p id="price" name="price"></p>
                        </td>
                        
                       
                        <td><button id="add" name="add" class="btn btn-primary">Add</button></td>
                        
                        
                       
                        </form>
                        </div>
                     </tr>
                  </tbody>
               </table>
               <div role="alert" id="errorMsg" class="mt-5" >
                 <!-- Error msg  -->
              </div>
            </div>
            <div class="col-md-7  mt-4" style="background-color:#f5f5f5;">
               <div class="p-4">
                  <div class="text-center">
                     <h4>Receipt</h4>
                  </div>
                  <span class="mt-4"> Time : </span><span  class="mt-4" id="time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> : <span id="year"></span>
                     </div>
                    
                  </div>
                  <div class="row">
                     </span>
                     <table id="receipt_bill" class="table">
                        <thead>
                           <tr>
                              <th> SlNo.</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                           </tr>
                        </thead>
                        <tbody id="new" >
                          
                        </tbody>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark" >
                                <h5><strong>Sub Total:  ₹ </strong></h5>
                                <p><strong>Tax (5%) : ₹ </strong></p>
                           </td>
                           <td class="text-center text-dark" >
                              <h5> <strong><span id="subTotal"></strong></h5>
                              <h5> <strong><span id="taxAmount"></strong></h5>
                           </td>
                        </tr>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark">
                              <h5><strong>Gross Total: ₹ </strong></h5>
                           </td>
                           <td class="text-center text-danger">
                              <h5 id="totalPayment"><strong> </strong></h5>
                               
                           </td>
                        </tr>
                     </table>
                  </div>
                  
                  
                  <form action="read_and_export.php" method="post">
<button type="submit" id="export" name="export"
 value="Export to excel" class="btn btn-success">Export To Excel</button>
</form>
                       
               </div>
            </div>
         </div>
      </section>        
   </body>
</html>
<script>
   $(document).ready(function(){
     $('#vegitable').change(function() {
      var id = $(this).find(':selected')[0].id;
       $.ajax({
          method:'POST',
          url:'fetch.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
            {
               $('#price').text(data.amount);
 		$('#pid').val(data.product_id);
               //$('#qty').text(data.product_qty);
            }
       });
     });
     
    // $("")
     
     /////
       
   $('#myform').submit(function(e){
    e.preventDefault(); // Prevent Default Submission

 
   //var dataString = $(this).serialize();
     
 //   alert(dataString); return false;
    var name = $('#vegitable').val();
        var qty = $('#qty').val();
        var price = $('#price').text();
     var id = $(this).find(':selected')[0].id;
     var dataString = 'id=' +id +'vegitable='+ name + '&qty='+ qty + '&price='+ price;
     alert(dataString);
    $.ajax({
      type: 'POST',
      url: 'adding.php',
      data: $("form").serialize(),
      success: function (data) {
      	alert("form was submitted");
        // Display message back to the user here
         $("#myform")[0].reset();
        
      },
    });
});


/*
   
   $(function(){
   
   $('form'.bind('submit',function(){
   	$.ajax({
   		type:'post',
   		url:"adding.php",
   		data:$("form").serialize(),
   		success:function(){
   			alert("form was submitted");
   		}
   });
   return false;
   });
   });
   
  */ 
   
     //add to cart 
     var count = 1;
     $('#add').on('click',function(){
    
    
        var name = $('#vegitable').val();
        var qty = $('#qty').val();
        var price = $('#price').text();
 
        if(qty == 0)
        {
           var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
           $('#errorMsg').html(erroMsg).fadeOut(9000);
        }
        else
        {
           billFunction(); // Below Function passing here 
           $.ajax({
   		type:'post',
   		url:"adding.php",
   		data:$("form").serialize(),
   		success:function(){
   			alert("form was submitted");
   		}
   });
        }
         
         
         
         
         
         
        function billFunction()
          {
          var total = 0;
       
          $("#receipt_bill").each(function () {
          var total =  price*qty;
          var subTotal = 0;
          subTotal += parseInt(total);
          
          var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+total+'">' +total+ '</strong></td></tr>';
          $('#new').append(table)
 
           // Code for Sub Total of Vegitables 
            var total = 0;
            $('tbody tr td:last-child').each(function() {
                var value = parseInt($('#total', this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
             $('#subTotal').text(total);
               
            // Code for calculate tax of Subtoal 5% Tax Applied
              var Tax = (total * 5) / 100;
              $('#taxAmount').text(Tax.toFixed(2));
 
             // Code for Total Payment Amount
 
             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();
 
             var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
             $('#totalPayment').text(totalPayment.toFixed(2)); // Showing using ID 
        
         });
         count++;
        } 
       });
           // Code for year 
             
           var currentdate = new Date(); 
             var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear();
                $('#year').text(datetime);
 
           // Code for extract Weekday     
                function myFunction()
                 {
                    var d = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Sunday";
                    weekday[1] = "Monday";
                    weekday[2] = "Tuesday";
                    weekday[3] = "Wednesday";
                    weekday[4] = "Thursday";
                    weekday[5] = "Friday";
                    weekday[6] = "Saturday";
 
                    var day = weekday[d.getDay()];
                    return day;
                    }
                var day = myFunction();
                $('#day').text(day);
     });
     
     
     
</script>
 
<!-- // Code for TIME -->
<script>
    window.onload = displayClock();
 
     function displayClock(){
       var time = new Date().toLocaleTimeString();
       document.getElementById("time").innerHTML = time;
        setTimeout(displayClock, 1000); 
     }
</script>



<script>
/*
 $(function(){
   
   $('form').bind('submit',function(){
   	$.ajax({
   		type:'post',
   		url:"adding.php",
   		data:$("form").serialize(),
   		success:function(){
   			alert("form was submitted");
   		}
   });
   return false;
   });
   });
*/

 
	function update(){
	 var bno = parseInt($('#billno').val());
	 $('#billno').val(bno+1);
	 
	}
</script>





