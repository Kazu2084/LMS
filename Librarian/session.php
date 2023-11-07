<?php 
session_start();
if (!isset($_SESSION['id'])){
//header('location:book.php');
}
$id_session=$_SESSION['id'];
?>