<?php
if (isset($_SESSION["cart_id"])) {
    $total_quantity = 0;
    $total_price = 0;
    foreach ($_SESSION["cart_id"] as $item) {
        $item_price = $item["soluong"] * $item["gia"];
        ?>

        <?php
        $total_quantity += $item["soluong"];
        $total_price += ($item["gia"] * $item["soluong"]);
    }
    ?>
    <div class="wrap-icon-header flex-w flex-r-m">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart icon-header-noti"
             data-notify="<?= $total_quantity ?>">

            <a href="cart.php" style="color: black; "> <i class="zmdi zmdi-shopping-cart"></i> </a>
        </div>

        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
           data-notify="0">
            <i class="zmdi zmdi-favorite-outline"></i>
        </a>
    </div>
    <?php
} else {
 echo '    <div class="wrap-icon-header flex-w flex-r-m">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart icon-header-noti"
             data-notify="0">

            <a href="cart.php" style="color: black; "> <i class="zmdi zmdi-shopping-cart"></i> </a>
        </div>

        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
           data-notify="0">
            <i class="zmdi zmdi-favorite-outline"></i>
        </a>
    </div>';
}
?>