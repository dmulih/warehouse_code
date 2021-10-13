<?php
include 'db.php';
$page='products';
$pagetitle='Product Listing';
include 'head.php';
include 'header.php';
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Product Listing
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <p id="output" style="color: orangered"></p>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Re-order Level</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query ="SELECT * FROM inventory";
                    $result = $db->query($query);
                    while ($row = $result->fetch_object()){ ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->product_name; ?></td>
                            <td><?php echo $row->quantity; ?></td>
                            <td><?php echo $row->reorder_level; ?></td>
                            <td>
                                <?php
                                echo '<button type="button" class="sale" data-id="'.$row->id.'" type="button">Sale</button>';
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
 $(".sale").click(function(){
   var el = this;
   var saleid = $(this).data("id");//alert(dispatchid);
   var confirmalert = confirm("Are you sure you want to perform sale transaction?");
   if (confirmalert == true) {
      $.ajax({
        url: "sale.php",
        type: "POST",
        data: { id:saleid },
        success: function(response){
          if(response == 1){
	       $("#output").html("Sale successfully transacted");
	       location.reload();
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