<?php
include('code.php');
//fetch the record to be updated
if(isset($_GET['edit'])){
$id =$_GET['edit'];
$edit_state=true;
$rec = mysqli_query($db,"SELECT * FROM ph_dir WHERE id=$id ");
$record =mysqli_fetch_array($rec);
$id= $record['id'];
$f_name= $record['f_name'];
$l_name= $record['l_name'];
$email= $record['email'];
$ph_no= $record['ph_no'];


}

?>

<!DOCTYPE html>

<html>
<head>
<title>Phone Directory</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
	<table>
	<thead>
	<tr>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Phone #</th>
	<th colspan="2">Action</th>
	<tbody>
	<?php while($row=mysqli_fetch_array($results)){?>
	<tr>
	<td><?php echo $row['id'];?></td>
	<td><?php echo $row['f_name'];?></td>
	<td><?php echo $row['l_name'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['ph_no'];?></td>
	
	<td>
	<a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
	</td>
	<td>
	<a class="del_btn" href="code.php?del=<?php echo $row['id']; ?>">Delete</a>
	</td>
	
	</tr>
	<?php } ?>
	</tbody>
	</tr>
	</thead>
	</table>
	<form method="post" action="code.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="f_name" value="<?php echo $f_name; ?>">
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="l_name" value="<?php echo $l_name; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Phone #</label>
			<input type="text" name="ph_no" value="<?php echo $ph_no; ?>">
		</div>
		<div class="input-group">
			<?php if($edit_state==false): ?>
			<button class="btn" type="submit" name="save" >Save</button>
			<?php else: ?>
			<button class="btn" type="submit" name="update" >Update</button>
			<?php endif ?>
			
			
		</div>
		<?php


if($_SESSION['logedin']==1){
echo '<a href="logout.php">logout</a>';
}else{

	header('location:login.php');
}
?>
	</form>
</body>

</html>