<?php
//extract($_POST);
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
?>
