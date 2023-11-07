<?php 

include('../Connection/connection.php');

$get_id=$_GET['book_id'];

mysqli_query($con,"delete from book where book_id = '$get_id' ")or die(mysqli_error());

header('location:book.php');
?>