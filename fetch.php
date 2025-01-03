<?php 
  include("db.php");
 // include("bills.php");
  
 
   $sql = "SELECT * FROM products WHERE product_id='".$_POST['id']."'";
   $query = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo json_encode($data);
 ?>

