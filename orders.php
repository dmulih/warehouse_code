<?php
include 'db.php';
$page='orders';
$pagetitle='View Orders';
include 'head.php';
include 'header.php';
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            List of Orders
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Quantity Ordered</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query ="SELECT t1.*,t2.product_name FROM orders t1 LEFT JOIN inventory t2 ON t1.product_id =t2.id ";
                    $result = $db->query($query);
                    while ($row = $result->fetch_object()){ ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->product_name; ?></td>
                            <td><?php echo $row->quantity; ?></td>
                            <td><?php if($row->status == 0){ echo 'Unprocessed';}elseif ($row->status == 1){ echo 'processed';} ?></td>
                            <td>
                            </td>
                        </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
include 'footer.php';
?>