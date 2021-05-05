<?php
$conn =new mysqli("localhost","root","ptn141122","pham_ptn_shop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>