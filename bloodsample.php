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
<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>
<body>

<?php include 'hnavbar.php' ; ?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				
				Available Blood Samples &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="#addbloodModal<?php echo $_SESSION['huid']; ?>" class="btn btn-warning" data-toggle="modal" > Add Blood </a>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							
							<th>Blood Sample (Group)</th>
							<th>Blood Type</th>
							<th>Blood Bank (Hospital)</th>
							<th>Location</th>
							<th>Change</th>
							<th>Delete</th>
						</thead>
			<?php
				$sql = "SELECT * FROM addblood WHERE hid = '$newId'";
				$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
					while($row=mysqli_fetch_array($res))
								
						{
							//$newAbid = $row['abid'];
							?>		
					
						<tbody>
							<td><?php echo $row['bgroup'] ;?></td>
							<td><?php echo $row['btype'] ;?></td>
							<td><?php echo $row['bhname'] ;?></td>
							<td><?php echo $row['bhloc'] ;?></td>
							<td><a href="#editbloodModal<?php echo $row['abid']; echo $_SESSION['huid']; ?>" data-toggle="modal" class="btn btn-info">Edit</button></td>
							<td><a href="hdelete.php?id=<?php echo $row['abid']; ?>" onclick="return ConfirmDelete();" class="btn btn-danger">Delete</button></td>
						</tbody>
						
						<!-- Modal Edit Blood Sample-->
							<div id="editbloodModal<?php echo $row['abid']; echo $_SESSION['huid']; ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add new available Blood Sample</h4>
								  </div>
								  <div class="modal-body">
										<form action="editbsample.php?abid=<?php echo $row['abid']; ?>" method="post">
											<div class="form-group">
												<label for="exampleInputEmail1">Blood Sample (Group)</label>
												<input type="text" class="form-control" name="bgroup" value="<?php echo $row['bgroup']; ?>">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Blood Type</label>
												<input type="text" class="form-control" name="btype" value="<?php echo $row['btype']; ?>">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Name of the Blood Bank (Hospital)</label>
												<input class="form-control" name="bhname" value="<?php echo $row['bhname']; ?>" >
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Bank Location</label>
												<input class="form-control" name="bhloc" value="<?php echo $row['bhloc']; ?>" >
											</div>
										
														  
											<button type="submit" name="editbloodSubmit" class="btn btn-primary">Update</button>
										</form>
										
								  </div>
										
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>
						<!-- Modal Edit Blood Sample-->
						
						<?php } ?>
						
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

<!-- Modal Add blood-->
			<div id="addbloodModal<?php echo $_SESSION['huid']; ?>" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add new available Blood Sample</h4>
				  </div>
				  <div class="modal-body">
						<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">Blood Sample (Group)</label>
								<input type="text" class="form-control" name="bgroup" placeholder="Enter Available Blood Sample">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Blood Type</label>
								<input type="text" class="form-control" name="btype" placeholder="Blood Type">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Name of the Blood Bank (Hospital)</label>
								<input class="form-control" name="bhname" value="<?php echo $_SESSION['bankname']; ?>" readonly>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Bank Location</label>
								<input class="form-control" name="bhloc" value="<?php echo $_SESSION['bankloc']; ?>" readonly>
							</div>
							<div class="form-group">
								
								<input type="hidden" class="form-control" name="bhid" value="<?php echo $_SESSION['huid']; ?>">
							</div>
										  
							<button type="submit" name="addbloodSubmit" class="btn btn-primary">Add</button>
						</form>
						
				  </div>
						
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
		<!-- Modal Add blood-->
		
								<?php }
						
								
						}
		}
		
		
		if(isset($_POST['addbloodSubmit']))
		
				{
					$bgroup = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bgroup']));
					
					$btype = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['btype']));
					
					$bhname = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bhname']));
					
					$bhloc = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bhloc']));
					
					$bhid = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bhid']));
					
						$addsql1="SELECT * FROM addblood WHERE bgroup = '$bgroup' AND hid = '$newId'"; //query-1
							$addrs1=mysqli_query($conn,$addsql1) or die("Error: ".mysqli_error($conn));
							if(mysqli_num_rows($addrs1) > 0) // the condition if there is no result regarding the search.
								{
									
									echo "<script>alert('This Blood Sample is already in database!');</script>" ;
										
								}
							else
								{
										$addsql4="INSERT INTO addblood (abid,bgroup,btype,bhname,bhloc,hid) VALUES('','$bgroup','$btype','$bhname','$bhloc','$bhid')" ;
										$addrs4= mysqli_query($conn, $addsql4) or die("Error: ".mysqli_error($conn));
										if($addrs4)
											{
												
												echo'<script>';
												echo 'alert("Done");';
												echo 'window.location.href="bloodsample.php";';
												echo '</script>';
											}
											else
											{
												echo'<script>';
												echo 'alert("Try again");';
												echo 'window.location.href="bloodsample.php";';
												echo '</script>';
											}	
								}
								
					
							
					
				}
				exit();
				
				
		?>
		
		