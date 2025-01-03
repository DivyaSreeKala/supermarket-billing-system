<?php
session_start();
include("db.php");
//extract($_POST);
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:employeelogin.html");
exit;
}
?>




<!DOCTYPE html>
<html>
<head>
<title>Billing details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">
<style>

.box2{
width: 600px;
height: 400px;
background: #808080;
color: #000;
top: 50%;
left: 65%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
}
.box3{
width: 600px;
height: 100px;
background:#fff;
color: #000;
top:140px;
left: 65%;
position: relative;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:6;
}

}

h1{
margin: 0;
font-size: 25px;
text-align: left;
padding: 10px;
}
.box1 input{
margin-bottom: 10px;
}
.box1 input[type="text"]
{
height:30px;
padding: 5px 10px;
margin: 10px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
font-size:16px;
}
.box1 input[type="submit"],input[type="reset"]
{
border: none;
outline: none;
height: 30px;
width: 80px;
background: #fb2525;
color: #fff;
font-size: 20px;
}
.box3 input[type="text"]
{
height:30px;
padding: 5px 5px;
margin: 5px 0;
border: 1px solid #ccc;
border-radius: 2px;
width:100px;
font-size:16px;
}
.box3 input[type="submit"]
{
border: none;
outline: none;
height: 30px;
width: 200px;
background: grey;
color: #fff;
font-size: 20px;
}

</style>
</head>
<body>
<header>
<!-- navigation bar-->
<ul class="topnav">
<li><a class="active" href="bill.php">Bill</a></li>
<li><a href="pro_details.php">Product Details</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<!-- end of navigation bar-->
</header>


<div class="box1">

<h1>Billing</h1>
<form action="bill1.php" method="post" name="bill">
<table width="450px" cellspacing="5px">
<tr>
<td>Product ID</td>
<td><input type="text" name="pid" id="t1" value=""></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" name="pname" id="t2" value=""></td>
</tr>
<tr>
<td>Price</td>
<td><input type="text" name="price" id="t3" value=""></td>
</tr>
<tr>
<td>Quantity</td>
<td><input type="text" name="qnty" id="text" value=""><td>
</tr>
<tr>
<td>Discount</td>
<td><input type="text" name="dis" id="t4" value=""></td>
</tr>

<tr>
<td><input type="submit" id="save"
name="save" value="Add" onclick="return sub();"></td>

<td><input type="reset"
name="reset" value="Clear"></td>
</tr>
</table>


</div>








<div class="box2">
 <table border="1" bordercolor="black" width="500px" cellspacing="5px"><tr>
                <th>Product Id</th>
                <th>Product Name</th>
                
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
<?php

include("db.php");
$sql = "SELECT * FROM bill order by sno asc";
$result = $conn->query($sql);



while($row = $result->fetch_array()){
	 echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
            echo "</tr>";
}

?>
</table>
</div>
<div class="box3">
<table cellspacing="10px" width="600px">
<tr><td>
<form action="gettotal.php" method="post" name="sum">
<input type="submit" name="total" id="submit" value="calculate total">
</form>
</td>
<td>
<form action="" method="post" name="sum">
<input type="submit" name="submit" id="submit" value="EXPORT TO EXCEL">
</form>
</td></tr>
</table>
</div>







</body>
</html>

