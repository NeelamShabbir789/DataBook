<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'phone_directory');

	// initialize variables
	$f_name = "";
	$l_name = "";
	$email="";
	$ph_no="";
	$id = 0;
	$edit_state = false;
	$update = false;

	if (isset($_POST['save'])) {
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$email=$_POST['email'];
		$ph_no=$_POST['ph_no'];

		mysqli_query($db, "INSERT into ph_dir(`f_name`,`l_name`,`email`,`ph_no`)VALUES('$f_name','$l_name','$email','$ph_no')");
		$_SESSION['message'] = "Record Saved"; 
		header('location: index.php');
	}

//update records
if (isset($_POST['update'])) {

	$id = $_POST['id'];
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$email = $_POST['email'];
	$ph_no = $_POST['ph_no'];
	
	$q= "UPDATE ph_dir SET f_name='$f_name', l_name='$l_name', email='$email',ph_no='$ph_no' WHERE id='$id' ";
	//$res = mysqli_query($db,$sql) or trigger_error(mysqli_error()." in ".$sql);
	$check=mysqli_query($db, $q) or die("Cannot UPDATE Record." .mysqli_error($db));
	$_SESSION['message'] = "Record updated!"; 
	header('location: index.php');
	
}
//delete records
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM ph_dir WHERE id=$id");
	$_SESSION['message'] = "Record deleted!"; 
	header('location: index.php');
}
	
//retrive records
$results=mysqli_query($db,"SELECT * FROM ph_dir ");	
?>
