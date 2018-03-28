<?php  

session_start();
session_regenerate_id();

	include 'connection.php' ;
								 
	if(isset($_POST["rlogSubmit"]))  
		
		{  
			$rlogemail = mysqli_real_escape_string($conn, $_POST["rlogemail"]);  
			$rlogpass = mysqli_real_escape_string($conn, $_POST["rlogpass"]);
			$sql = "SELECT * FROM receivers WHERE email = '$rlogemail'";
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
									
									if(password_verify($rlogpass, $row['password']))
													
										{
											//$uid = $_SESSION['rlogemail'];
											$ruid = $row['rid'];
											$bgroup = $row['bgroup'];
											$receiverName = $row['name'];
											$receiverEmail = $row['email'];
											//echo $receiverName ;
											$_SESSION['ruid'] = $ruid;
											$_SESSION['rbgroup'] = $bgroup;
											$_SESSION['rname'] = $receiverName;
											$_SESSION['remail'] = $receiverEmail;
											$_SESSION['visit']=time();
											
											header('location:dashboard.php');
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
										  
										  

										