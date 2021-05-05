<?php
include 'config/config.php';
if (isset($_POST['f_name']) && $_POST['l_name'] && $_POST['email'] && $_POST['phone'] && $_POST['address'] && $_POST['city'] && $_POST['state'] && $_POST['zip'] && $_POST['datepicker'] )  {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
//    $datepicker = $_POST['datepicker'];
    $datepicker = "20121/11/11";
    $user_mua = "nuuuu";
//    $browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";

    $stmt = $conn->prepare("INSERT INTO users (users,hovaten,hoten,email,sdt,dia_chi,city,state,zip,ngaysinh) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssss", $user_mua, $f_name, $l_name, $email, $phone, $address, $city, $state, $zip, $datepicker);
    $stmt->execute();

}
