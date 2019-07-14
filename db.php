<?php

$con = mysqli_connect("localhost","root","","my_db");
$db = mysqli_select_db( $con,"my_db");
if(!$db)
{
	echo "Not Connected";

}
else{

	echo"Connected";
}

?>
