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
				$newAbid = $_REQUEST['abid'];
				//$newUsername = $_SESSION['husername'];
				
			if(isset($_POST['editbloodSubmit']))
		
				{
					$bgroup = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bgroup']));
					
					$btype = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['btype']));
					
					$bhname = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bhname']));
					
					$bhloc = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bhloc']));
					
					
					
						$editBloodSql = "UPDATE addblood set bgroup = '$bgroup', btype = '$btype', bhname = '$bhname', bhloc = '$bhloc' WHERE abid = '$newAbid' AND hid = '$newId' ";
						$editBloodRs = mysqli_query($conn,$editBloodSql) or die("Error: ".mysqli_error($conn));
						
						if($editBloodRs)
						{
							echo'<script>';
							echo 'alert("Updated successfully");';
							echo 'window.location.href="bloodsample.php";';
							echo '</script>';
						}
						else
						{
							echo'<script>';
							echo 'alert("Try Again");';
							echo 'window.location.href="bloodsample.php";';
							echo '</script>';
						}
				}
			}
		}
		exit();




?>