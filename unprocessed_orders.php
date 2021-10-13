<?php
include 'db.php';
$page='unprocessed_orders';
$pagetitle='View Unprocessed Orders';
include 'head.php';
include 'header.php';
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            List of Unprocessed Orders
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query ="SELECT t1.*,t2.product_name,t2.id as product_id FROM orders t1 LEFT JOIN inventory t2 ON t1.product_id =t2.id WHERE t1.status =0";
                    $result = $db->query($query);
                    while ($row = $result->fetch_object()){ ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->product_name; ?></td>
                            <td><?php echo $row->quantity; ?></td>
                            <td><?php if($row->status == 0){ echo 'Unprocessed';}else{ echo 'N/A';} ?></td>
                            <td>
                                <?php
                                echo '<button type="button" class="dispatch" data-id="'.$row->id.'" type="button">Dispatch</button>';
                                ?>
                            </td>
                        </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
$script .='
$(document).ready(function(){
 $(".dispatch").click(function(){
   var el = this;
   var dispatchid = $(this).data("id");//alert(dispatchid);
   var confirmalert = confirm("Are you sure you want to dispatch?");
   if (confirmalert == true) {
      $.ajax({
        url: "dispatch.php",
        type: "POST",
        data: { id:dispatchid },
        success: function(response){
          if(response == 1){
	    // Remove row from HTML Table
	    $(el).closest("tr").css("background","green");
	    $(el).closest("tr").fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert("Invalid ID.");
          }
        }
      });
   }
 });
});';
include 'footer.php';

?>