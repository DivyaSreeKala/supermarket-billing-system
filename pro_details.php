<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>add product details</title>
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
	
	.box input{
		
		margin-bottom: 10px;
		
	}
	.box input[type="text"],input[type="password"]
	{
		
		 height:30px;
		 width:200px;
		  padding: 5px 10px;
		  margin: 10px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		font-size:16px;
	}
	.box input[type="submit"]
	{
		width:100px;
		border: none;
		outline: none;
		height: 30px;
		width: 70px;
		background: #8c8c8c;
		color: #fff;		
	}
	

</style>


</head>
<body>

<header>
	<!-- navigation bar-->
<ul class="topnav">
  <li><a href="bills.php">Bill</a></li>
<li><a class="active" href="pro_details.php">Product Details</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
	<!-- end of navigation bar-->
</header>

<div class="box">

	<h1>PRODUCT DETAILS</h1>
	<div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="prodetails">
			
		Product ID:<input type="text" name="t1" value="" id="pid">
		<input type="submit" name="s1" value="search">
	</form>
	</div>

</div>



</body>
</html>

<?php
//extract($_POST);
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:employeelogin.html");
exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
include("db.php");
$id=$_POST["t1"];

echo $id;
$date=date("Y-m-d");
$sql="select * from products where product_id='$id'";

if($result = $conn->query($sql)){
    if($result->num_rows > 0){
    echo '<div class="box1">';
       echo '<div class="tableFixHead">';
        echo "<table>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>pid</th>";
                echo "<th>pname</th>";
                
                echo "<th>quantity</th>";
                echo "<th>amount</th>";
                echo "<th>description</th>";
            echo "</tr>";
        echo "</thead>";
        
        echo "<tbody>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                 echo "<td>" . $row['description'] . "</td>";
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
 

$sql->close();
$conn->close();
}

?>
