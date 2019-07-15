<?php
require('db.php');


$status = "";
if(isset($_POST['new']) && $_POST['new']==1){

    $name =$_REQUEST['name'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $mobile = $_REQUEST['mobile'];

    $ins_query="insert into users
    (`name`,`email`,`pass`,`mobile`)values
    ('$name','$email','$pass','$mobile')";
    mysqli_query($con,$ins_query)
    or die(mysqli_error($con));
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
    header("Location: view.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
|
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="text" name="email" placeholder="Enter email" required /></p>
<p><input type="text" name="pass" placeholder="Enter password" required /></p>
<p><input type="text" name="mobile" placeholder="Enter mobile" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>