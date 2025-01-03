<?php

include("db.php");
// $id="p101";
  $sql = "SELECT * FROM bill";
   $query = mysqli_query($conn,$sql);
//query($query);
$items = array();
//Store table records into an array

// $result->fetch_assoc()
while( $row =mysqli_fetch_assoc($query)) {
$items[] = $row;
}
//Check the export button is pressed or not
if(isset($_POST["export"])) {
//Define the filename with current date
$fileName = "itemdata-".date('d-m-Y').".xls";

//Set header information to export data in excel format
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
$heading = false;

//Add the MySQL table data to excel file
if(!empty($items)) {
foreach($items as $item) {
if(!$heading) {
echo implode("\t", array_keys($item)) . "\n";
$heading = true;
}
echo implode("\t", array_values($item)) . "\n";
}
}
exit();
}

?>
