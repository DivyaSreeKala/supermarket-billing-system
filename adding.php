
<?php
//include("bills.php");
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:employeelogin.html");
    exit;

}


?>

<?php 

  include("db.php");
 $bill_no=$_POST['billno'];
 $id=$_POST['pid'];
$quantity=$_POST['qty'];
//$quantity=$_POST["qty"];

$date=date("Y-m-d");
$time=date("h:i:s");

//if($bill_no===0){
//	$bill_no=1;}

$eid='e101';
$sql = "SELECT * FROM products WHERE product_id='".$_POST['pid']."'";
   $query = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
   $name=$row['product_name'];
$price=$row['amount'];
$qty=$row['quantity'];
         
   }
   
   $sql=$conn->prepare("insert into bill(bill_no,product_id,product_name,amount,quantity,emp_id,b_date,b_time) values (?,?,?,?,?,?,?,?)" );
$sql->bind_param("ssssssss",$bill_no,$id,$name,$price,$quantity,$eid,$date,$time);
$sql->execute();
   
$qty=$qty-$quantity;
$s=$conn->prepare("update products set quantity='$qty' where product_id='$id'" );
$s->execute();






 ?>
