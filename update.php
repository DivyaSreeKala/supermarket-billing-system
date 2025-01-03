<?php


include("db.php");
$id=$_POST['id'];
 
// Attempt update query execution
$sql="select * from products where product_id='$id'";

 $query = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo json_encode($data);

?>
