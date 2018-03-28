<?php

		$conn = mysqli_connect("localhost","root","") or die(mysqli_error());
		
		$db = 'bloodbank_internshala';
		mysqli_select_db($conn,$db) or die(mysqli_error());
		
?>