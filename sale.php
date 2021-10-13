<?php
include 'db.php';
$id = $_POST['id'];
$sql = "SELECT * FROM inventory WHERE id='".$id."'";
$result = $db->query($sql);
$product = $result->fetch_object();
$new_stock = $product->quantity - 1;
$sql2 = "UPDATE inventory SET quantity ='".$new_stock."' WHERE id = '".$product->id."'";
if($db->query($sql2)){
    echo 1;
    exit;
}else{
    echo 0;
    exit;
}

