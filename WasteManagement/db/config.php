<?php 
	$con =  new mysqli("localhost","root","","waste_management");
	
	if($con->connect_error){
		die("Something going to wrong please try again later.");
	}
	
	
?>