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
				//$newUsername = $_SESSION['husername'];
				$sql = "SELECT * FROM hospitals WHERE hid = '$newId'";
				$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
			
							while($row=mysqli_fetch_array($res))
								
								{
									?>
										  
<?php include 'head.php' ; ?>

<body onload="ld()">

<script>
	
	function ld()
	{
		document.search_box.search.focus();
		
	}
</script>

<?php include 'hnavbar.php' ; ?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				About Blood Bank (Hospital)
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							
							<th>Name of the Blood Bank (Hospital)</th>
							<th>Email</th>
							<th>Location</th>
							<th>Registration Date</th>
							<th>Edit Your Profile</th>
						</thead>
						<tbody>
							<td><?php echo $row['hname'] ;?></td>
							<td><?php echo $row['hemail'] ;?></td>
							<td><?php echo $row['hloc'] ;?></td>
							<td><?php echo $row['htime'] ;?></td>
							<td><a href="#editModal<?php echo $_SESSION['huid']; ?>" data-toggle="modal" class="btn btn-info">Edit</button></td>
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
			<div id="editModal<?php echo $_SESSION['huid']; ?>" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Blood Bank Profile</h4>
				  </div>
				  <div class="modal-body">
						<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">Name of the Blood Bank (Hospital)</label>
								<input type="text" class="form-control" name="hname" value="<?php echo $row['hname']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="text" class="form-control" name="hemail" value="<?php echo $row['hemail']; ?>" >
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1">Location</label>
								<input class="form-control" name="hloc" value="<?php echo $row['hloc']; ?>" >
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
										<?php 
								
										
										
								}
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
					$hname=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hname']));
					
					$hemail=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hemail']));
					
					$hloc=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hloc']));
					
					//$hpass=htmlspecialchars(mysqli_real_escape_string($conn, password_hash( $_POST['hpass'],PASSWORD_BCRYPT)));
					
					$editSql = "UPDATE hospitals set hname = '$hname', hloc = '$hloc', hemail = '$hemail' WHERE hid = $newId";
					$editRs = mysqli_query($conn,$editSql) or die("Error: ".mysqli_error($conn));
					
					if($editRs)
					{
						echo'<script>';
						echo 'alert("Successfully Updated");';
						echo 'window.location.href="bankdashboard.php";';
						echo '</script>';
					}
					else
					{
						echo'<script>';
						echo 'alert("Try Again");';
						echo 'window.location.href="bankdashboard.php";';
						echo '</script>';
					}
						
				}
		?>