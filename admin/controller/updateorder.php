<?php

require_once "../db/connect.php";

$order_id = $_POST['record'];
//echo $order_id;
$sql = "SELECT * from orders where order_id='$order_ic'";
$result = $conn->query($sql);
//  echo $result;

$row = $result->fetch_assoc();

// echo $row["pay_status"];

if ($row[""] == 0) {
    $update = mysqli_query($conn, "UPDATE orders where order_id='$order_id");
} else if ($row["order_status"] == 1) {
    $update = mysqli_query($conn, "UPDATE orders where order_id='$order_id");
}
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
