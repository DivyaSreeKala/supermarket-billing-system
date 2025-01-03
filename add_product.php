
<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:employeelogin.html");
    exit;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Product Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="nav.css">

<style>

	html {
	  background: url(supermarket.jpg) no-repeat center center fixed;
	  background-size: cover;
	  height: 100%;
	  overflow: hidden;
	}

	.box{
		width: 500px;
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
	.box input[type="text"],input[type="password"]
	{
		
		 height:30px;
		  padding: 5px 20px;
		  margin: 10px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		font-size:16px;
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
	

</style>


</head>
<body>

<header>
	<!-- navigation bar-->
<ul class="topnav">
  <li><a href="add_emp.php">Add Employee</a></li>
  <li><a class="active" href="add_product.html">Add Product</a></li>
  <li><a href="emp_details.php">Employee Details</a></li>
  <li><a href="transaction.php">View Transaction</a></li>
  <li><a href="inventory.php">Inventory</a></li>
  <li><a href="update_stock.php">Update Stock</a></li>
  <li><a href="s_product.php">Sales per Product</a></li>
  <li><a href="s_day.php">Sales per Day</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
	<!-- end of navigation bar-->
</header>

<div class="box">

	<h1>ADD PRODUCT DETAILS</h1>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="add_product">
			
		<table width="450px" cellspacing="5px">	
		<tr>
			<td>Product ID</td>
			<td><input type="text" name="pid" id="t1" value=""></td> 
		</tr>
		<tr>
			<td>Product Name</td>
			 <td><input type="text" name="pname" id="t2" value=""></td>
		</tr>	  
		<tr>
			<td>Quantity</td>
			 <td><input type="text" name="quantity" id="t3" value=""></td> 
		</tr> 
		<tr>
			<td>Amount</td>
			 <td><input type="text" name="amt" id="text" value=""><td>
		</tr> 
		<tr>
			<td>Description</td>
			 <td><input type="text" name="description" id="t4" value=""></td> 
		</tr>
		<tr>		
			<td colspan="2" style="text-align:center"><input type="submit" name="submit" value="Add"></td>
			
		</tr>	
		</table>
	</form>	
</div>



</body>
</html>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
//extract($_POST);
include("db.php");

$id=$_POST["pid"];
$name=$_POST["pname"];
$quantity=$_POST["quantity"];
$amount=$_POST["amt"];
$description=$_POST["description"];


$sql=$conn->prepare("insert into products(product_id,product_name,quantity,amount,description) values (?,?,?,?,?)" );
	$sql->bind_param("ssids",$id,$name,$quantity,$amount,$description);
	
               
if ($sql->execute()) 
{
	echo "Record inserted successfully.<br />";
}
else 
{
	echo "Could not insert record into table: ".$conn->error. "<br />";
}

$sql->close();
$conn->close();
}
?>