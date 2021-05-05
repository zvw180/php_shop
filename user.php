<?php include("config/session.php") ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<body class="animsition">

<!-- Header -->
<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <?php include('includes/topbar.php'); ?>

        <?php include('includes/menu2.php') ?>


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

<section class="bg0 p-t-80 p-b-140">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li class="p-t-0 p-b-40 ">
                            <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"><i class="fa fa-user"></i> Dashboard</a>
                        </li>
                        <li class="p-t-0 p-b-40" >
                            <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"><i class="zmdi zmdi-shopping-cart"></i> Components</a>
                        </li>
                        <li class="p-t-0 p-b-40">
                            <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"><i class="fa fa-heart"></i> Extras</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-7">
                <div class="col-md-10">
                    <table class="table table-stripped">
                        <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><i class="fa fa-star"></i></td>
                            <td><b>Mozilla</b></td>
                            <td><b>In celebration of women and girls everywhere</b></td>
                            <td></td>
                            <td>Mar 10</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- breadcrumb -->


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
