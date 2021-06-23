<?php session_start();
 
if (isset($_SESSION['username']))
{
    unset($_SESSION['username']); // xóa session login
	header("Location:dangnhap.php");
}
unset($_SESSION['username']);
session_destroy();
header("Location:dangnhap.php");
?>

