<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Billing details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">
<style>
html {
background: url(supermarket.jpg) no-repeat center center fixed;
background-size: cover;
height: 100%;
overflow: hidden;
}
.box1{
width: 100%;
height: 90%;
background: #fff;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
}
.box2{
width: 600px;
height: 400px;
background: #808080;
color: #0ff;
top: 50%;
left: 65%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
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
<li><a class="active" href="billing.php">Bill</a></li>
<li><a href="pro_details.php">Product Details</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<!-- end of navigation bar-->
</header>


<div class="box1">

<h1>Billing</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
method="post" name="bill">
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
<td><input type="submit"
name="save" value="Add"></td>

<td><input type="reset"
name="save" value="Clear"></td>
</tr>
</table>

</div>

</form>

<div class="box2">
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
$id=$_POST["pid"];
$name=$_POST["pname"];
$price=$_POST["price"];
$quantity=$_POST["qnty"];
$discount=$_POST["dis"];

$date=date("Y-m-d");
//$sql=$conn->prepare("insert into employee(emp_id,emp_name,mob_no,address,email_id,password,doj) values (?,?,?,?,?,?,?)" );
//$sql->bind_param("sssssss",$id,$name,$mobile,$address,$email,$password,$date);
if ($sql->execute())
//not null not working???? javascript
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


			create table bills(bill_no int primary key AUTO_INCREMENT,product_no varchar(10) not null,product_name varchar(20) not null,amount decimal(5,2) not null,quantity int not null,emp_id varchar(10) not null,b_date date,b_time time);






<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Billing details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">
<style>
html {
background: url(supermarket.jpg) no-repeat center center fixed;
background-size: cover;
height: 100%;
overflow: hidden;
}
.box1{
width: 100%;
height: 40%;
background: #fff;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
}
.box2{
width: 600px;
height: 400px;
background: #808080;
color: #0ff;
top: 50%;
left: 65%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
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
<li><a class="active" href="bill.php">Bill</a></li>
<li><a href="pro_details.php">Product Details</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<!-- end of navigation bar-->
</header>


<div class="box1">

<h1>Billing</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
method="post" name="bill">
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
<td><input type="submit"
name="save" value="Add"></td>

<td><input type="reset"
name="save" value="Clear"></td>
</tr>
</table>

</div>

</form>

<div class="box2">
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
$bill_no=5;
$id=$_POST["pid"];
$name=$_POST["pname"];
$price=$_POST["price"];
$quantity=$_POST["qnty"];

$date=date("Y-m-d");
$time=date("h:i:s");

$eid=$_SESSION["id"];

/*$sql=$conn->prepare("insert into bills(bill_no,product_id,product_name,amount,quantity,emp_id,b_date,b_time) values (?,?,?,?,?,?,?,?)" );
$sql->bind_param("ssssssss",$bill_no,$id,$name,$price,$quantity,$eid,$date,$time);
if ($sql->execute())
//not null not working???? javascript
{
echo '<script>alert("Record inserted successfully ")</script>';
}
else
{
echo "Could not insert record into table: ".$conn->error. "<br />";
}
*/

$sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        echo "<table border=1 width=50% >";
            echo "<tr>";
                echo "<th>pid</th>";
                echo "<th>pname</th>";
                
                echo "<th>quantity</th>";
                echo "<th>amount</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
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




<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Billing details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">
<style>
html {
background: url(supermarket.jpg) no-repeat center center fixed;
background-size: cover;
height: 100%;
overflow: hidden;
}
.box1{
width: 100%;
height: 100%;
background: #fff;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:1;
}
.box2{
width: 600px;
height: 400px;
background: #939393;
color: #000;
top: 50%;
left: 65%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:2;
}

h1{
margin: 0;
font-size: 25px;
text-align: left;
padding: 15px;
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
height: 40px;
width: 100px;
background: #fb2525;
color: #fff;
font-size: 20px;
}
.box2 table{
border-collapse: collapse;
margin-left:auto;
margin-right:auto;
width:50%;
position: absolute;
z-index:3;
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
method="post" name="bill">
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
<td><input type="submit"
name="save" value="Add"></td>

<td><input type="reset"
name="save" value="Clear"></td>
</tr>
</table>

</div>

</form>

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
$id=$_POST["pid"];
$name=$_POST["pname"];
$price=$_POST["price"];
$quantity=$_POST["qnty"];

$date=date("Y-m-d");
$time=date("h:i:s");

//if($bill_no===0){
//	$bill_no=1;}

$eid=$_SESSION["id"];

$sql=$conn->prepare("insert into bills(bill_no,product_id,product_name,amount,quantity,emp_id,b_date,b_time) values (?,?,?,?,?,?,?,?)" );
$sql->bind_param("ssssssss",$bill_no,$id,$name,$price,$quantity,$eid,$date,$time);
if ($sql->execute())
//not null not working???? javascript
{
echo '<script>alert("Record inserted successfully ")</script>';
}
else
{
echo "Could not insert record into table: ".$conn->error. "<br />";
}

?>


<div class="box2">
        <table border=1>
            <tr>
                <th>pid</th>
                <th>pname</th>
                
                <th>quantity</th>
                <th>amount</th>
            </tr>
 
<?php
            $sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){
        ?>
        
            <tr>
                <td><?php echo $row['product_id'];?></td>
                <td><?php echo $row['product_name'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['amount'];?></td>
            </tr>
            </table>
     </div>
        <?php
        }
       
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

//error



<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Billing details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">
<style>
html {
background: url(supermarket.jpg) no-repeat center center fixed;
background-size: cover;
height: 100%;
overflow: hidden;
}
.box1{
width: 100%;
height: 100%;
background: #fff;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:1;
}
.box2{
width: 600px;
height: 400px;
background: #939393;
color: #000;
top: 50%;
left: 65%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:2;
}

h1{
margin: 0;
font-size: 25px;
text-align: left;
padding: 15px;
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
height: 40px;
width: 100px;
background: #fb2525;
color: #fff;
font-size: 20px;
}
.box2 table{
border-collapse: collapse;
margin-left:auto;
margin-right:auto;
width:50%;
position: absolute;
z-index:3;
}
</style>

<script>
	function addItem(){
	
	var html="<tr>";
	html +="<td><input name='pid[]'></td>";
	html +="<td><input name='pname[]'></td>";
	html +="<td><input name='quantity[]'></td>";
	html +="<td><input name='amount[]'></td>";
	html+="</tr>";
	
	document.getElementById("tbody").insertRow().innerHTML=html;
	}
</script>


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
<form action="billview.php" method="post" name="bill">
<table width="450px" cellspacing="5px">
<tr>
<td>Product ID</td>
<td><input type="text" name="pid" id="t1" value=""></td>
<td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
		    <button class="button" >search</button>
		</form></td>


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
<td><input type="submit"
name="save" value="Add" onclick="addItem();"></td>

<td><input type="reset"
name="save" value="Clear"></td>
</tr>
<tbody id="tbody"></tbody>
</table>

</div>

</form>




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
$id=$_POST["pid"];
$quantity=$_POST["qnty"];




 
<?php
            $sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){
        
        
            
              echo $row['product_id'];
                 echo $row['product_name'];
               echo $row['quantity'];
               echo $row['amount'];
           
        
        }
 }
 }



$sql->close();
$conn->close();
}

?>


//with js

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Billing details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">
<style>
html {
background: url(supermarket.jpg) no-repeat center center fixed;
background-size: cover;
height: 100%;
overflow: hidden;
}
.box1{
width: 100%;
height: 100%;
background: #fff;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:1;
}
.box2{
width: 600px;
height: 400px;
background: #939393;
color: #000;
top: 50%;
left: 65%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:2;
}

h1{
margin: 0;
font-size: 25px;
text-align: left;
padding: 15px;
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
height: 40px;
width: 100px;
background: #fb2525;
color: #fff;
font-size: 20px;
}
.box2 table{
border-collapse: collapse;
margin-left:auto;
margin-right:auto;
width:50%;
position: absolute;
z-index:3;
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



</body>
</html>




<?php
//extract($_POST);
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:employeelogin.html");
exit;
}

?>

<div class="box1">

<h1>Billing</h1>
<form action="#"
method="POST" name="bill">
<table width="450px" cellspacing="5px">
<tr>
<td>Product ID</td>
<td><input type="text" name="pid" id="t1" value=""></td>
<td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1" >
		    <input type="submit" value="search" name="search" onClick="return saveComment();" >
		</form></td>
</tr>


<script>
document.getElementById("t1").value=localStorage.getItem("pid");
function saveComment(){
	
	var pid=document.getElementById("t1").value;
	
	if(pid==""){
	alert("enter product id!");
	return false;}
	
	localStorage.setItem("pid",pid);
	
	pid=localStorage.getItem("pid");
	
	
}
</script>


<?php

if(isset($_POST['search'])){
include("db.php");
$id=$_POST["pid"];

$sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){
     ?>
     
        
            <tr>
<td>Name</td>
<td><input type="text" name="pname" id="t2" value="<?php echo $row['product_name'];?>"></td>
</tr>
<tr>
<td>Price</td>
<td><input type="text" name="price" id="t3" value="<?php echo $row['amount'];?>"></td>
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
<td><input type="submit" name="save" value="Add"></td>

<td><input type="reset" name="save" value="Clear"></td>
</tr>
</table>

</form>
                
 </div>               
                
      <?php      
        }
       
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

asdsdfdsgsgdg

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Billing details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">
<style>
html {
background: url(supermarket.jpg) no-repeat center center fixed;
background-size: cover;
height: 100%;
overflow: hidden;
}
.box1{
width: 100%;
height: 100%;
background: #fff;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:1;
}
.box2{
width: 600px;
height: 400px;
background: #939393;
color: #000;
top: 50%;
left: 65%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:2;
}
.box3{
top:10%;
left:50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
width:150px;
height:50px;
z-index:3;
}
h1{
margin: 0;
font-size: 25px;
text-align: left;
padding: 15px;
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
height: 40px;
width: 100px;
background: #fb2525;
color: #fff;
font-size: 20px;
}
.box2 table{
border-collapse: collapse;
margin-left:auto;
margin-right:auto;
width:50%;
position: absolute;
z-index:3;
}
.box3 input[type="text"]{
width:50px;
height:20px;
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



</body>
</html>




<?php
//extract($_POST);
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:employeelogin.html");
exit;
}

?>


<div class="box1">


<h1>Billing</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
method="POST" name="bill">
<table  border=1 width="450px" cellspacing="5px">

<tr>
<td>Product ID</td>
<td><input type="text" name="pid" id="t1" value=""></td>
<td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1" >
		    <input type="submit" value="search" name="search" onClick="return saveComment();" >
		</form></td>
</tr>


<script>
document.getElementById("t1").value=localStorage.getItem("pid");
function saveComment(){
	
	var pid=document.getElementById("t1").value;
	
	if(pid==""){
	alert("enter product id!");
	return false;}
	
	localStorage.setItem("pid",pid);
	
	pid=localStorage.getItem("pid");
	
	
}
</script>


<?php

if(isset($_POST['search'])){
include("db.php");
$id=$_POST["pid"];

$sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){
     ?>
     
        
            <tr>
<td>Name</td>
<td><input type="text" name="pname" id="t2" value="<?php echo $row['product_name'];?>"></td>
</tr>
<tr>
<td>Price</td>
<td><input type="text" name="price" id="t3" value="<?php echo $row['amount'];?>"></td>
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
<td><input type="submit" name="save" value="Add"></td>

<td><input type="reset" name="save" value="Clear"></td>
</tr>
</table>

</form>

               
      <?php      
        }
       
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
 
}
?>

<?php

if(isset($_POST['save'])){

$id=$_POST["pid"];
$name=$_POST["pname"];
$price=$_POST["price"];
$quantity=$_POST["qnty"];

$date=date("Y-m-d");
$time=date("h:i:s");

//if($bill_no===0){
//	$bill_no=1;}

$eid=$_SESSION["id"];

$sql=$conn->prepare("insert into bill(bill_no,product_id,product_name,amount,quantity,emp_id,b_date,b_time) values (?,?,?,?,?,?,?,?)" );
$sql->bind_param("ssssssss",$bill_no,$id,$name,$price,$quantity,$eid,$date,$time);
if ($sql->execute())
//not null not working???? javascript
{
echo '<script>alert("Record inserted successfully ")</script>';
}
else
{
echo "Could not insert record into table: ".$conn->error. "<br />";
}

?>
<div class="box2">
 
<?php
            $sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
    echo '<div class="box2">';
    echo "<table border=1 width=50% >";
            echo "<tr>";
                echo "<th>pid</th>";
                echo "<th>pname</th>";
                
                echo "<th>quantity</th>";
                echo "<th>amount</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
        ?>
        
            <tr>
                <td><?php echo $row['product_id'];?></td>
                <td><?php echo $row['product_name'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['amount'];?></td>
            </tr>
            </table>
     </div>
        <?php
        }
       
        // Free result set
      //  $result->free();
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



next//



<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Billing details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="nav.css">
<style>
html {
background: url(supermarket.jpg) no-repeat center center fixed;
background-size: cover;
height: 100%;
overflow: hidden;
}
.box1{
width: 100%;
height: 100%;
background: #fff;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:1;
}
.box2{
width: 600px;
height: 400px;
background: #939393;
color: #000;
top: 50%;
left: 65%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 20px 20px;
z-index:2;
}

h1{
margin: 0;
font-size: 25px;
text-align: left;
padding: 15px;
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
height: 40px;
width: 100px;
background: #fb2525;
color: #fff;
font-size: 20px;
}
.box2 table{
border-collapse: collapse;
margin-left:auto;
margin-right:auto;
width:50%;
position: absolute;
z-index:3;
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



</body>
</html>




<?php
//extract($_POST);
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location:employeelogin.html");
exit;
}

?>

<div class="box1">

<h1>Billing</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
method="POST" name="bill">
<table width="450px" cellspacing="5px">
<tr>
<td>Product ID</td>
<td><input type="text" name="pid" id="t1" value=""></td>
<td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1" >
		    <input type="submit" value="search" name="search" onClick="return saveComment();" >
		</form></td>
</tr>


<script>
document.getElementById("t1").value=localStorage.getItem("pid");
function saveComment(){
	
	var pid=document.getElementById("t1").value;
	
	if(pid==""){
	alert("enter product id!");
	return false;}
	
	localStorage.setItem("pid",pid);
	
	pid=localStorage.getItem("pid");
	
	
}
</script>


<?php

if(isset($_POST['search'])){
include("db.php");
$id=$_POST["pid"];

$sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){
     ?>
     
        
            <tr>
<td>Name</td>
<td><input type="text" name="pname" id="t2" value="<?php echo $row['product_name'];?>"></td>
</tr>
<tr>
<td>Price</td>
<td><input type="text" name="price" id="t3" value="<?php echo $row['amount'];?>"></td>
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
<td><input type="submit" name="save" value="Add"></td>

<td><input type="reset" name="save" value="Clear"></td>
</tr>
</table>

</form>
                
 </div>               
                
      <?php      
        }
       
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
 
}
?>


<?php
//extract($_POST);
// Check if the user is logged in, if not then redirect him to login page


if(!empty($_POST['save'])){
include("db.php");
$id=$_POST["pid"];
$name=$_POST["pname"];
$price=$_POST["price"];
$quantity=$_POST["qnty"];

$date=date("Y-m-d");
$time=date("h:i:s");

//if($bill_no===0){
//	$bill_no=1;}

$eid=$_SESSION["id"];

$sql=$conn->prepare("insert into bill(bill_no,product_id,product_name,amount,quantity,emp_id,b_date,b_time) values (?,?,?,?,?,?,?,?)" );
$sql->bind_param("ssssssss",$bill_no,$id,$name,$price,$quantity,$eid,$date,$time);
if ($sql->execute())
//not null not working???? javascript
{
echo '<script>alert("Record inserted successfully ")</script>';
}
else
{
echo "Could not insert record into table: ".$conn->error. "<br />";
}

?>



 
<?php
            $sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
   echo '<div class="box2">';
    
    echo '<table border=1 width=50% >';
            echo '<tr>';
                echo '<th>pid</th>';
                echo '<th>pname</th>';
                
                echo '<th>quantity</th>';
                echo '<th>amount</th>';
            echo '</tr>';
        while($row = $result->fetch_array()){
        ?>
        
            <tr>
                <td><?php echo $row['product_id'];?></td>
                <td><?php echo $row['product_name'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['amount'];?></td>
            </tr>
            </table>
     </div>
        <?php
        }
       
        // Free result set
      //  $result->free();
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






<?php
if($_POST['save']){
include("db.php");

$id=$_POST["pid"];
$name=$_POST["pname"];
$price=$_POST["price"];
$quantity=$_POST["qnty"];

$date=date("Y-m-d");
$time=date("h:i:s");

$eid=$_SESSION["id"];

/*$sql=$conn->prepare("insert into bills(bill_no,product_id,product_name,amount,quantity,emp_id,b_date,b_time) values (?,?,?,?,?,?,?,?)" );
$sql->bind_param("ssssssss",$bill_no,$id,$name,$price,$quantity,$eid,$date,$time);
if ($sql->execute())
//not null not working???? javascript
{
echo '<script>alert("Record inserted successfully ")</script>';
}
else
{
echo "Could not insert record into table: ".$conn->error. "<br />";
}
*/

$sql = "SELECT * FROM products WHERE product_id='$id'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
    echo '<div class="box2">';
        echo "<table border=1 width=50% >";
            echo "<tr>";
                echo "<th>pid</th>";
                echo "<th>pname</th>";
                
                echo "<th>quantity</th>";
                echo "<th>amount</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
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

