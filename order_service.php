<?php
include 'db.php';
$query ="SELECT * FROM inventory WHERE `quantity` =`reorder_level`";
$result = $db->query($query);
while($row = $result->fetch_object()){
    //check if there is unprocessed order for the same product
    $query2 ="SELECT * FROM orders WHERE product_id ='".$row->id."' AND status = 0";//echo $query2;exit;
    $result2 = $db->query($query2);
    if(mysqli_num_rows($result2) == 0){
            $queryb ="INSERT INTO `orders`(`product_id`, `quantity`) VALUES('".$row->id."',20)";
            if($db->query($queryb)){
                echo $row->product_name.' re-ordered Successfulty'."\n";
            }
    }else{
        echo 'There is a pending order.Please contact store manager for processing.';
    }

}