<?php
$aVar = mysqli_connect('localhost','root','', 'test');

$id=$_REQUEST['id'];
echo $id;
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($aVar,$query) or die ( mysqli_error());
header("Location: dashboard.php"); 
?>