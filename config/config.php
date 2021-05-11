<?php
$conn =new mysqli("localhost","root","","pham_ptn_shop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
