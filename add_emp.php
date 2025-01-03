

<?php

session_start();
 
 // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:adminlogin.html");
    exit;

}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Add Employee Details</title>
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
		height: 500px;
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
  <li><a class="active" href="add_emp.php">Add Employee</a></li>
  <li><a href="add_product.php">Add Product</a></li>
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

	<h1>ADD EMPLOYEE DETAILS</h1>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="add_emp">
			
		<table width="450px" cellspacing="5px">	
		<tr>
			<td>Employee ID</td>
			<td><input type="text" name="emp_id" id="t1" value=""></td> 
		</tr>
		<tr>
			<td>Employee Name</td>
			 <td><input type="text" name="emp_name" id="t2" value=""></td>
		</tr>	  
		<tr>
			<td>Mobile Number</td>
			 <td><input type="text" name="mob_no" id="t3" value=""></td> 
		</tr> 
		<tr>
			<td>Address</td>
			 <td><input type="text" name="address" id="text" value=""><td>
		</tr> 
		<tr>
			<td>Email ID</td>
			 <td><input type="text" name="email_id" id="t4" value=""></td> 
		</tr>
		<tr>
			<td>Password</td>
			 <td><input type="password" name="password" id="p1" value=""><td>
		</tr>
		<tr>		
			<td colspan="2" style="text-align:center"><input type="submit" name="save" value="Add"></td>
			
		</tr>	
		</table>
	</form>	
</div>

</body>
</html>


<?php
//extract($_POST);


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:adminlogin.html");
    exit;

}


if($_SERVER["REQUEST_METHOD"] == "POST"){
	include("db.php");

	$id=$_POST["emp_id"];
	$name=$_POST["emp_name"];
	$mobile=$_POST["mob_no"];
	$address=$_POST["address"];
	$email=$_POST["email_id"];
	$password=$_POST["password"];

	$date=date("Y-m-d");

	$sql=$conn->prepare("insert into employee (emp_id,emp_name,mob_no,address,email_id,password,doj) values (?,?,?,?,?,?,?)" );
		$sql->bind_param("sssssss",$id,$name,$mobile,$address,$email,$password,$date);
		
		       
	if ($sql->execute()) 							//not null not working????    javascript
	{
		echo '<script>alert("Record inserted successfully ")</script>';
	}
	else 
	{
		echo "Could not insert record into table: ".$conn->error. "<br />";
	}

	$sql->close();
	$conn->close();
}
?>
