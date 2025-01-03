<?php
include("db.php");
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
$sql=$conn->prepare("select * from products where pid='$id'" );

if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        echo "<table border=1 width=50% >";
            echo "<tr>";
                echo "<th>pid</th>";
                echo "<th>pname</th>";
                
                echo "<th>quantity</th>";
                echo "<th>amount</th>";
                echo "<th>description</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                 echo "<td>" . $row['description'] . "</td>";
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
