<?php include("config/session.php") ?>
<?php
include 'config/config.php';

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';


$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $datepicker = $_POST['datepicker'];
    $ip = getenv("REMOTE_ADDR");
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $user_f = substr($f_name, 0, 2);
    $user_l = substr($l_name, 0, 2);

    $user_mua = $user_f . "" . $user_l;
    $password = substr((string)$email, "1", "10");
    $password = sha1($password);

    $stmt = $conn->prepare("INSERT INTO users (users,hovaten,hoten,password,email,sdt,dia_chi,city,state,zip,ngaysinh,iplocation,thietbi) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssisssisss", $user_mua, $f_name, $l_name, $password, $email, $phone, $address, $city, $state, $zip, $datepicker, $ip, $browser);
    $stmt->execute();
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    setcookie("username", $user_mua, time() + (1 * 365 * 24 * 60 * 60));
    setcookie("password", "Done", time() + (1 * 365 * 24 * 60 * 60));



    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'phamthanhnamdev@gmail.com';
    $mail->Password = 'nguyenxuantrung2';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('phamthanhnamdev@gmail.com');

    $mail->addAddress($_SESSION['email']);
    $mail->addReplyTo('phamthanhnamdev@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Xác nhận đăng kí thành công';
    $mail->Body = "<h3>Họ và Tên : " . $_SESSION["fname"] . "" . $_SESSION["lname"] . "</h3>";


    if ($mail->send()) {
        header("location: user.php");
    } else {
        header("location: thanhtoan.php");
    }


}
?>

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
    </div>
</header>

<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <form class="needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="thanhtoan">
            <div class="form-row">
                <div class="col-md-10 mb-3">
                    <label for="validationTooltip01">First name</label>
                    <input type="text" class="form-control" id="validationTooltip01" value="" name="fname"
                           placeholder="First name" required>

                </div>
                <div class="col-md-10 mb-3">
                    <label for="validationTooltip01">Last name</label>
                    <input type="text" class="form-control" id="validationTooltip01" value="" name="lname"
                           placeholder="First name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="datepicker">Birthday</label>
                    <input type="date" class="form-control" id="datepicker" value="2018-07-22" name="datepicker"
                           placeholder="Birthday" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">Email</label>
                    <input type="email" class="form-control" id="validationTooltip02" value="" name="email"
                           placeholder="Email" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltipUsername">Number phone</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="validationTooltipUsername" value="" name="phone"
                               placeholder="Number phone" required>
                    </div>
                </div>
                <div class="col-md-10 mb-3">
                    <label for="validationTooltip01">Street address</label>
                    <input type="text" class="form-control" id="validationTooltip01" value="" name="address"
                           placeholder="Street address" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">City</label>
                    <input type="text" class="form-control" id="validationTooltip03" value="" name="city"
                           placeholder="City" required>

                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">State</label>
                    <input type="text" class="form-control" id="validationTooltip04" value="" name="state"
                           placeholder="State" required>

                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Zip</label>
                    <input type="text" class="form-control" id="validationTooltip05" value="" name="zip"
                           placeholder="Zip" required>
                </div>
            </div>
            <button type="submit" value="submit" name="submit" id="submitThanhToan"
                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                Add to cart
            </button>
        </form>
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

