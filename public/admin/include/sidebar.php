<div id="sidebar">
    <div class="sidebar h-100">
        <div class="sidebar-logo text-center">
            <a href="index.php" style="letter-spacing:5px;">FRUITAbLES</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                <?php echo $_SESSION['user_role'] ?> Elements
            </li>
            <li class="sidebar-item">
                <a href="index.php" class="sidebar-link"><i class="fa-solid fa-house pe-2"></i>Dashboard</a>
            </li>
            <?php
            if ($_SESSION['user_role'] == "Admin") {
                echo '<li class="sidebar-item">
                        <a href="managecostumer.php" class="sidebar-link"><i class="fa-solid fa-users pe-2"></i>Manage Costumer</a>
                    </li>';
            }
            ?>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" arua-expended="false"> <i class="fa-solid fa-cart-plus pe-2"></i>Product</a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="addproduct.php" class="sidebar-link"><i class="fa-solid fa-square-plus px-2"></i>Add Product</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="manageproduct.php" class="sidebar-link"><i class="fa-solid fa-square-pen px-2"></i>Manage Product</a>
                    </li>
                </ul>
            </li>
            <?php
            if ($_SESSION['user_role'] == 'Admin') {
            ?>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#retail" data-bs-toggle="collapse" arua-expended="false"><i class="fa-solid fa-shop pe-2"></i>Retailer</a>
                    <ul id="retail" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="approvedretailer.php" class="sidebar-link"><i class="fa-solid fa-square-plus px-2"></i>Approved Retailer</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="manageretailer.php" class="sidebar-link"><i class="fa-solid fa-square-pen px-2"></i>Manage Retailer</a>
                        </li>
                    </ul>
                </li>
            <?php
            } else if ($_SESSION['user_role'] == 'Retailer') { ?>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#retail" data-bs-toggle="collapse" arua-expended="false"><i class="fa-solid fa-clipboard-list pe-2"></i>Orders <span id="order"></span></a>
                    <ul id="retail" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="vieworder.php" class="sidebar-link"><i class="fa-solid fa-notes-medical px-2"></i>New Orders
                            <span class="order"></span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="confirmedorders.php" class="sidebar-link"><i class="fa-solid fa-clipboard-check px-2"></i>Confirmed Orders</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="completeorders.php" class="sidebar-link"><i class="fa-solid fa-square-check px-2"></i>Completed Orders</a>
                        </li>
                    </ul>
                </li>
            <?php
            }
            ?>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#inquiry" data-bs-toggle="collapse" arua-expended="false"><i class="fa-solid fa-headset pe-2"></i>Iquiry</a>
                <ul id="inquiry" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <?php
                    if ($_SESSION['user_role'] == 'Admin') {
                        echo '<li class="sidebar-item">
                                <a href="confirmedinquiry.php" class="sidebar-link"><i class="fa-solid fa-square-check px-2"></i>Confirmed Inquiry</a>
                            </li>';
                    }
                    if($_SESSION['user_role'] == 'Retailer'){
                        echo ' <li class="sidebar-item">
                        <a href="manageinquiry.php" class="sidebar-link"><i class="fa-solid fa-square-pen px-2"></i>Manage Inquiry</a>
                    </li>';
                    }
                    ?>
                   
                    <li class="sidebar-item">
                        <a href="completeticket.php" class="sidebar-link"><i class="fa-solid fa-square-check px-2"></i>Complete Inquiry</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>