

<?php

session_start();
 
 ?>


<html>

<head>

<title>Update Stock</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
<style>
html {
 background: url(supermarket.jpg) no-repeat center center fixed;
 background-size: cover;
 height: 100%;
 overflow: hidden;
}
.box{
width: 550px;
height: 450px;
background: #fff;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 30px;
}
h1{
margin: 0;
font-size: 25px;
text-align: center;
padding: 20px;
}
.box input{
margin-bottom: 10px;
}
.box input[type="text"]
{
 width: 100%;
 padding: 5px 20px;
 margin: 20px 0;
 display: inline-block;
 border: 1px solid #ccc;
 border-radius: 4px;
 box-sizing: border-box;
}
.box input[type="submit"]
{
border: none;
outline: none;
height: 40px;
width: 100px;
background: #fb2525;
color: #fff;
font-size: 20px;

}

button {
background: #8c8c8c;
color: #fff;
width:70px;
height:30px;
}

</style>
</head>
<body>
<header>
<!-- navigation bar-->
<ul class="topnav">
 <li><a href="add_emp.php">Add Employee</a></li>
 <li><a href="add_product.php">Add Product</a></li>
 <li><a href="emp_details.php">Employee Details</a></li>
 <li><a href="transaction.php">View Transaction</a></li>
 <li><a href="inventory.php">Inventory</a></li>
 <li><a class="active" href="update_stock.php">Update Stock</a></li>
 <li><a href="s_product.php">Sales per Product</a></li>
 <li><a href="s_day.php">Sales per Day</a></li>
 <li><a href="logout.php">Logout</a></li>
</ul>
<!-- end of navigation bar-->
</header>
<div class="box">
<h1>Update Stock</h1>
<div>






<table width="500px">	
<tr>
<td width="40%">Product ID:</td><td><input type="text" name="pid" id="pid" value=""></td>
<td><button name="search" id="search" onclick="return check()">search</button></td>
</tr>



<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<tr>
<input type="hidden" name="id" id="id" value="">
<td>Product Name:</td><td><input type="text" name="name" id="name" value=""><br></td>
</tr>
<tr>
<td>Quantity Available:</td><td><input type="text" name="qty" id="qty" value=""><br></td>
</tr>
<tr>
<td>Quantity Purchased:</td><td><input type="text" name="t4" value=""><br></td>
</tr>
<tr>
<td><input type="submit" name="s2" value="update"></td>
</tr>
</table>
</form>



</div>
</div>

<script>


 $(document).ready(function(){
     $('#search').on('click',function(){
      var id = $('#pid').val();
       $.ajax({
          method:'POST',
          url:'fetch.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
            {
               $('#name').val(data.product_name);
 		$('#qty').val(data.quantity);
               $('#id').val(data.product_id);
            }
       });
     });
   });


	//$(document).ready(function(){
	//$('#search').on('click',function(){
/*	function check(){
	 var id = document.getElementById("id").value;
	
	
	
	
	//$('#t3').text(no);
	 $.ajax({
   		type:'post',
   		url:'update.php',
   		data:{id:id},
   		dataType:'json',
   		success:function(data){
   			alert("ok");
   			$('#name').val(data.product_id);
   			$('#qty').text(data.amount);
   		}
   	
   });
  }
   //});
   //});
*/

</script>


</body>
</html>




<?php


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:adminlogin.html");
    exit;

}


if($_SERVER["REQUEST_METHOD"] == "POST"){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include("db.php");
$id=$_POST['id'];
$qp=$_POST['t4'];
 
// Attempt update query execution
$s="select * from products where product_id='$id'";


if($result = $conn->query($s))
//conn->query() performs query against database
{
	if($result->num_rows>0)
	//num_rows gives no. of rows
	{
	
		while($row=$result->fetch_array())
		//fetch_array() converts t associative or numeric array
		{
		$q= $row['quantity'];	
		//select one value
		}
	}    
}
$res=$q+$qp;
//$res=$result-$qp;

$sql = "UPDATE products SET quantity='$res' WHERE product_id='$id'";
if($conn->query($sql) === true){
    echo '<script>alert("Record inserted successfully.")</script>';
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
 
// Close connection
$conn->close();
}
?>


