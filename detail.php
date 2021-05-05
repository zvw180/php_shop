<?php
include 'config/config.php';
$id = $_SERVER['QUERY_STRING'];
$stmt = $conn->prepare("SELECT * FROM sanpham where id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo "";
} else {
    header('Location:index.php');
}
$conn->close();
?>
<?php
session_start();
include 'config/config.php';
if (isset($_POST['id_c']) && $_POST['num-product']) {
    $id_c = $_POST['id_c'];
    $so_luong = $_POST['num-product'];


    if (!empty($so_luong)) {
        $data = array();
        $stmt = $conn->prepare("SELECT * FROM sanpham where id=?");
        $stmt->bind_param("s", $id_c);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $data[] = $row;
        $rowArray = array($row[0]['id'] = array('sanpham' => $row['ten_san_pham'], 'gia' => $row['gia'], 'image' => $row['image'], 'id' => $row['id'], 'soluong' => $so_luong));


        if (!empty($_SESSION["cart_id"])) {

            if (in_array($row[0]["id"], array_keys($_SESSION["cart_id"]))) {

                foreach ($_SESSION["cart_id"] as $k => $v) {

                    if ($row[0]["code"] == $k) {

                        if (empty($_SESSION["cart_id"][$k]["soluong"])) {

                            $_SESSION["cart_id"][$k]["soluong"] = 0;
                        }
                        $_SESSION["cart_id"][$k]["soluong"] += $_POST["soluong"];
                    }
                }
            } else {
                $_SESSION["cart_id"] = array_merge($_SESSION["cart_id"], $rowArray);
            }

        } else {
            $_SESSION["cart_id"] = $rowArray;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<body class="animsition">

<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->

        <?php include('includes/topbar.php'); ?>

        <?php include('includes/menu.php'); ?>
        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
</header>

<!-- Product Detail -->
<?php include('config/productdetail.php'); ?>


<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <?php include('config/slide2.php'); ?>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->

<?php include('includes/footer.php'); ?>
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<?php include('includes/script.php'); ?>

</body>
</html>