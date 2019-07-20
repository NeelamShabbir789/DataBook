<?php
include('code.php');

if(isset($_POST['login']))
{
		$email=$_POST['email'];
		$pas=$_POST['password'];
		md5($pas);

//create table "admin" and insert "email" and "password" and then apply the below query

	$query="SELECT * from admin WHERE email='$email' and password='$pas'";
	$exe_query= mysqli_query($db,$query);
	$found_num_rows= mysqli_num_rows($exe_query);
	if($found_num_rows==1)
	{
	$_SESSION['logedin']=1;
	$_SESSION['name']='neelam';
	
	header('location:index.php');
	}

	else{
		echo "Please Register";
		session_destroy();
	}

}
else{
	header('location:login.php');
}

?>