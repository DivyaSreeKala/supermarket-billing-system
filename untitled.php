<?php
//extract($_POST);
include("db.php");

$id=$_POST["emp_id"];
$name=$_POST["emp_name"];
$mobile=$_POST["mob_no"];
$address=$_POST["address"];
$email=$_POST["email_id"];
$password=$_POST["password"];

$date=curdate();


	
	$insertSQL="INSERT INTO employee(emp_id,emp_name,mob_no,address,email_id,password) VALUES(?,?,?,?,?,?)";
	$stmt=$conn->prepare($insertSQL);
	$stmt->bind_param("ssssss",$id,$name,$mobile,$address,$email,$password);
	
	
	
	
	//$result=mysqli_query($conn,"INSERT into employee values('','$id','$name','$mobile','$address','$email','$password','$date')");
	
	//$query="INSERT INTO employee(emp_id,emp_name,mob_no,address,email_id,password) VALUES ('$id','$name','$mobile','$address','$email','$password',  ) ";
	
	//mysqli_query($conn,$query)or die("could not perform query");
	//header("Location:add_emp.html");
	//$stmt=$conn->prepare("insert into employee(emp_id,emp_name,mob_no,address,email_id,password,doj) values ("$id","$name","$mobile","$address","$email","$password", "2011-11-1") ");
	//$stmt->bind_param("ssssss",$id,$name,$mobile,$address,$email,$password,curdate());(?,?,?,?,?,?,?)
	
	$stmt->execute();
	$stmt->close();
	$conn->close();



?>


//$sql = "INSERT INTO employee(emp_id,emp_name,mob_no,address,email_id,password,doj) VALUES ('$id','$name','$mobile','$address','$email','$password','$date')";



<?php
//extract($_POST);
include("db.php");

$id=$_POST["emp_id"];
$name=$_POST["emp_name"];
$mobile=$_POST["mob_no"];
$address=$_POST["address"];
$email=$_POST["email_id"];
$password=$_POST["password"];

$date=curdate();


//$result=mysql_query("INSERT INTO employee(emp_id,emp_name,mob_no,address,email_id,password) VALUES (?,?,?,?,?,?)");
	
	$stmt=$conn->prepare("insert into employee (emp_id,emp_name,mob_no,address,email_id,password) values (?,?,?,?,?,?)" );
	$stmt->bind_param("ssssss",$id,$name,$mobile,$address,$email,$password);
	
	
	$stmt->execute();
	
	echo "success";
	
	$stmt->close();
	$conn->close();



?>





