<?php 
session_start();
session_regenerate_id();

	include 'connection.php' ;
								 
	if(isset($_SESSION['huid']))
		
		{  
			if((time() - $_SESSION['visit']) > 600)		
			
			{
				echo'<script>';
				echo 'alert("TIME OUT. Please Log in again!");';
				echo 'window.location.href="index.php";';
				echo '</script>';
			}
			
			else
			{
				$_SESSION['visit']=time();	
				$newId = $_SESSION['huid'];
				$newRid = $_REQUEST['id'];
				$sql = "SELECT * FROM request WHERE hid = '$newId'";
				$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
				
				$acSql = "UPDATE request set reqstatus = 'Pending' WHERE hid = '$newId' AND rid = $newRid";
				$acRs = mysqli_query($conn,$acSql) or die("Error: ".mysqli_error($conn));
					
					if($acRs)
					{
						echo'<script>';
						echo 'alert("Cancled");';
						echo 'window.location.href="hrequest.php";';
						echo '</script>';
					}
					else
					{
						echo'<script>';
						echo 'alert("Try again");';
						echo 'window.location.href="hrequest.php";';
						echo '</script>';
					}
			}
		}
		else
			{
				echo'<script>';
				echo 'alert("Something went wrong!");';
				echo 'window.location.href="hrequest.php";';
				echo '</script>';
			}

?>