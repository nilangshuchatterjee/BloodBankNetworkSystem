<?php  

session_start();
session_regenerate_id();

	include 'connection.php' ;
								 
	if(isset($_POST["hlogSubmit"]))  
		
		{  
			$hlogemail = mysqli_real_escape_string($conn, $_POST["hlogemail"]);  
			$hlogpass = mysqli_real_escape_string($conn, $_POST["hlogpass"]);
			$sql = "SELECT * FROM hospitals WHERE hemail = '$hlogemail'";
			$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
				if(mysqli_num_rows($res)==0)  
					
					{  
						echo '<script type="text/javascript">'; 
						echo 'alert("You have not registered yet! register first.");'; 
						echo 'window.location.href = "index.php";';
						echo '</script>'; 
									  
					}
					else
						{
							while($row=mysqli_fetch_array($res))
								
								{
									
									if(password_verify($hlogpass, $row['hpass']))
													
										{
											//$uid = $_SESSION['rlogemail'];
											$huid = $row['hid'];
											$bankname = $row['hname'];
											$bankloc = $row['hloc'];
											$_SESSION['huid'] = $huid;
											$_SESSION['bankname'] = $bankname;
											$_SESSION['bankloc'] = $bankloc;
											$_SESSION['visit']=time();
											header('location:bankdashboard.php');
										}
										
										else
											{
												echo'<script>';
												echo 'alert("Invalid USERNAME or PASSWORD!");';
												echo 'window.location.href="index.php";';
												echo '</script>';
											}
										
								}
						}
		}
										  ?>
										  
										  
