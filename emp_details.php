<?php

session_start();
 
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>employee details</title>
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
	
	.box1{
		width: 500px;
		height: 200px;
		background: #fff;
		color: #000;
		top: 60%;
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
		border:none;
		border-bottom:1px solid #000;
		background: transparent;
		outline: none;
		height: 40px;
		font-size:16px;
	}
	.box input[type="submit"]
	{
		border: none;
		outline: none;
		height: 30px;
		width: 70px;
		background: #8c8c8c;
		color: #fff;
		
	}
	
	
	
	input[type=text], select {
  width: 50%;
  padding: 5px 20px;
  margin: 20px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


.tableFixHead {
      width: 100%;
      table-layout: fixed;
      border-collapse: collapse;
    }
      .tableFixHead tbody {
      display: block;
      width: 100%;
      overflow: auto;
      height: 200px;
    }
    .tableFixHead thead tr {
      display: block;
    }
    .tableFixHead th,
    .tableFixHead  td {
      padding: 5px 10px;
      width: 200px;
    }
    th {
      background: #ABDD93;
    }
	
	tr:nth-child(even){background-color: #d9d9d9}
	

</style>

</head>
<body>

<header>
	<!-- navigation bar-->
<ul class="topnav">
  <li><a href="add_emp.php">Add Employee</a></li>
  <li><a href="add_product.php">Add Product</a></li>
  <li><a class="active" href="emp_details.php">Employee Details</a></li>
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
	<h1>EMPLOYEE LOGIN DETAILS</h1>
	<div>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1">
	Employee ID:<select name="empid">
		<option selected>---select---</option>
		<option value="e101">e101</option>
		<option value="e102">e102</option>
		<option value="e103">e103</option>
	</select>
	<input type="submit" value="Search">
	</form>
	</div>
</div>

</body>
</html>

<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:adminlogin.html");
    exit;

}
if($_SERVER["REQUEST_METHOD"] == "POST"){
include("db.php");

$eid=$_POST['empid'];
// Attempt select query execution
$sql = "SELECT * FROM employee WHERE emp_id='$eid'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
    echo '<div class="box1">';
       echo '<div class="tableFixHead">';
        echo "<table>";
          echo "<thead>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";
                
             //   echo "<th>email</th>";
                echo "<th>doj</th>";
            echo "</tr>";
           echo "</thead>";
          // echo "<tbody>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['emp_id'] . "</td>";
                echo "<td>" . $row['emp_name'] . "</td>";
                //echo "<td>" . $row['last_name'] . "</td>";
               // echo "<td>" . $row['email_id'] . "</td>";
                echo "<td>" . $row['doj'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo '</div>';
        echo '</div>';
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
 }
// Close connection
$conn->close();
?>
