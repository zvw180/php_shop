<?php
session_start();
$user=$_SESSION['cart_id'];
if(!isset($user)){
    header("location:index.php");
}
?>
