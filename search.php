<?php
session_start();
include "config.php";
$name=$_POST['name'];
$model=$_POST['model'];
$color=$_POST['color'];
$price=$_POST['price'];
$country_id = $_SESSION['country_id'];
$find = mysqli_query($conn, "SELECT * FROM warehouse WHERE country_id = $country_id");
$row = mysqli_fetch_assoc($find);
if ($row){
$warehouse_id = $row['warehouse_id'];
$location = $row['location'];
}
else {
	$warehouse_id = '0';
	$location = '';
}

if(!empty($name) || !empty($model) || !empty($color) || !empty($price)){
$sql = "SELECT * FROM car WHERE warehouse_id='$warehouse_id' ";
if(!empty($name)){
    $sql .= "AND name LIKE '%".$name."%' ";
}
if(!empty($model)){
    $sql .= "AND model LIKE '%".$model."%' ";
}
if(!empty($color)){
    $sql .= "AND color LIKE '%".$color."%' ";
}
if(!empty($price)){
    $sql .= "AND price BETWEEN 0 AND '$price' ";
}
$sql .= "ORDER BY car_id" ;
$result = mysqli_query($conn, $sql);
echo mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['name']."</td>
		          <td>".$row['model']."</td>
		          <td>".$row['color']."</td>
		          <td>".$row['price']."</td>
		          <td>".$row['plate_no']."</td>
		          <td>".$row['condition']."</td>
				  <td>".$location."</td>
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}
}
?>