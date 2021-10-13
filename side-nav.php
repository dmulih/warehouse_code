<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview <?php if(isset($page) && ($page=='index')) { echo 'active'; } ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if(isset($page) && ($page=='index')) { echo 'class="active"'; } ?>><a href="index.php"><i class="fa fa-circle-o"></i> Overview</a></li>
                </ul>
            </li>
            <li class="treeview <?php if(isset($page) && ($page=='products')) { echo 'active'; } ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Product Listing</span>
                    <span class="pull-right-container">
              <i class="fa fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if(isset($page) && ($page=='products')) { echo 'class="active"'; } ?>><a href="products.php"><i class="fa fa-tasks"></i>View Products</a></li>
                </ul>
            </li>
            <li class="treeview <?php if(isset($page) && ($page=='orders' || $page=='unprocessed_orders')) { echo 'active'; } ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Order Management</span>
                    <span class="pull-right-container">
              <i class="fa fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if(isset($page) && ($page=='orders')) { echo 'class="active"'; } ?>><a href="orders.php"><i class="fa fa-tasks"></i>Order List</a></li>
                    <li <?php if(isset($page) && ($page=='unprocessed_orders')) { echo 'class="active"'; } ?>><a href="unprocessed_orders.php"><i class="fa fa-tasks"></i>Unprocessed Re-orders</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>