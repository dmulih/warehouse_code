<?php
include 'db.php';
//echo '<pre>';var_dump($_POST);exit;
$id = $_POST['id'];
$sql ="SELECT * FROM orders WHERE id ='".$id."' AND status=0";
$result = $db->query($sql);
while ($row = $result->fetch_object()){
    $sql2 ="SELECT * FROM inventory WHERE id ='".$row->product_id."'";
    $result2 = $db->query($sql2);
    $product = $result2->fetch_object();
    $new_stock = $product->quantity + $row->quantity;
    $sql3 ="UPDATE inventory  SET quantity='".$new_stock."' WHERE id='".$row->product_id."'";
    if($db->query($sql3)){
        $sql4 ="UPDATE orders SET status=1 WHERE id='".$row->id."'";
        if($db->query($sql4)){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
}