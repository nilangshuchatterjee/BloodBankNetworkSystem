<?php  

session_start();
session_regenerate_id();

	include 'connection.php' ;
								 
	if(isset($_SESSION['ruid']))
		
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
				$newId = $_SESSION['ruid'];
				$newRbgroup = $_SESSION['rbgroup'];
				
				$sql = "SELECT * FROM receivers WHERE rid = '$newId'";
				$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
			
							while($row=mysqli_fetch_array($res))
								
								{
										  ?>
										  
										  
<?php include 'head.php' ; ?>

<body>

<?php include 'rnavbar.php' ; ?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				About You
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							
							<th>Name</th>
							<th>Email</th>
							<th>Blood Group</th>
							<th>Registration Date</th>
							<th>Edit Your Profile</th>
						</thead>
						<tbody>
							<td><?php echo $row['name'] ;?></td>
							<td><?php echo $row['email'] ;?></td>
							<td><?php echo $row['bgroup'] ;?></td>
							<td><?php echo $row['regtime'] ;?></td>
							<td><a href="#editModal<?php echo $_SESSION['ruid']; ?>" data-toggle="modal" class="btn btn-info">Edit</a></td>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	<div
	</div>
<br><br><br><br>
<?php include 'footer.php'; ?>
	
</body>
</html>
<!-- Modal Edit Profile-->
			<div id="editModal<?php echo $_SESSION['ruid']; ?>" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Your Profile</h4>
				  </div>
				  <div class="modal-body">
						<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" >
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1">Blood Group</label>
								<input class="form-control" name="bgroup" value="<?php echo $row['bgroup']; ?>" >
							</div>
							
										  
							<button type="submit" name="editSubmit" class="btn btn-primary">Update</button>
						</form>
						
				  </div>
						
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
		<!-- Modal Edit Profile-->
										<?php }
								}
						}
									else
										{
											echo'<script>';
											echo 'alert("Sign In First");';
											echo 'window.location.href="index.php";';
											echo '</script>';
										}
		
		?>
		
		<?php 
		// update script
				
				if(isset($_POST['editSubmit']))
				{
					$name=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name']));
					
					$email=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
					
					$bgroup=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bgroup']));
					
					//$password=htmlspecialchars(mysqli_real_escape_string($conn, password_hash( $_POST['password'],PASSWORD_BCRYPT)));
					
					$editSql = "UPDATE receivers set name = '$name', email = '$email', bgroup = '$bgroup' WHERE rid = '$newId'";
					$editRs = mysqli_query($conn,$editSql) or die("Error: ".mysqli_error($conn));
					
					if($editRs)
					{
						echo"<script>alert('Successfully Updated');</script>";
					}
					else
					{
						echo"<script>alert('Try Again');</script>";
					}
						
				}
		?>