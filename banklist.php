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
				$newRname = $_SESSION['rname'];
				$newRemail = $_SESSION['remail'];
				
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
				
				Available Blood Samples and Blood Banks 
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							
							<th>Blood Sample (Group)</th>
							<th>Blood Type</th>
							<th>Blood Bank (Hospital)</th>
							<th>Location</th>
							<th>Send Request</th>
							
						</thead>
			<?php
				$sql = "SELECT * FROM addblood WHERE bgroup = '$newRbgroup' ";
				$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
					while($row=mysqli_fetch_array($res))
								
						{
							?>		
					
						<tbody>
							<td><?php echo $row['bgroup'] ;?></td>
							<td><?php echo $row['btype'] ;?></td>
							<td><?php echo $row['bhname'] ;?></td>
							<td><?php echo $row['bhloc'] ;?></td>
							
							<td><a href="#sendModal<?php echo $row['abid']; ?>" data-toggle="modal" class="btn btn-info">Send Request</a></td>
						</tbody>
						
						<!-- Modal Send request-->
							<div id="sendModal<?php echo $row['abid']; ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Confirm your Request</h4>
								  </div>
								  <div class="modal-body">
										<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
											<div class="form-group">
												<label for="exampleInputEmail1">Name Of the Blood Bank (Hospital)</label>
												<input type="text" class="form-control" name="bbname" value="<?php echo $row['bhname']; ?>" readonly>
											</div>
											
											<div class="form-group">
												
												<input type="hidden" class="form-control" name="recid" value="<?php echo $_SESSION['ruid']; ?>" readonly>
											</div>
											
											<div class="form-group">
												<label for="exampleInputEmail1">Receiver Name</label>
												<input type="text" class="form-control" name="recname" value="<?php echo $_SESSION['rname']; ?>" readonly>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Receiver Email</label>
												<input type="text" class="form-control" name="recemail" value="<?php echo $_SESSION['remail']; ?>" readonly>
											</div>
												
													
											<div class="form-group">
												
												<input type="hidden" class="form-control" name="rhid" value="<?php echo $row['hid']; ?>" readonly>
											</div>
											
														  
											<button type="submit" name="sendSubmit" class="btn btn-primary">Send</button>
										</form>
										
								  </div>
										
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>
						<!-- Modal Send request-->
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		
		
		
	<div
	</div>
<br><br><br><br>
								<?php include 'footer.php';?>
	
</body>
</html>



								<?php }
			}
		}?>
		
		<?php 
		
				
				if(isset($_POST['sendSubmit']))
				{
					$bbname=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bbname']));
					
					$recname=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['recname']));
					
					$recemail=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['recemail']));
					
					$rhid=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['rhid']));
					
					$recid=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['recid']));
					
					//$password=htmlspecialchars(mysqli_real_escape_string($conn, password_hash( $_POST['password'],PASSWORD_BCRYPT)));
					
					$reqSql1 = "SELECT * FROM request WHERE hid = '$rhid' AND rid = '$newId'"; //query-1
					$reqRs1 = mysqli_query($conn,$reqSql1) or die("Error: ".mysqli_error($conn));
							
							if(mysqli_num_rows($reqRs1) > 0) // the condition if there is no result regarding the search.
								{
									
									echo "<script>alert('Your request has already been sent to this blood bank.');</script>" ;
										
								}
								else
								{
					
									$reqSql2 = "INSERT INTO request (reqid,bbname,recname,recemail,hid,rid) VALUES('','$bbname','$recname','$recemail','$rhid','$recid')";
									$reqRs2 = mysqli_query($conn,$reqSql2) or die("Error: ".mysqli_error($conn));
									
									if($reqRs2)
									{
										echo"<script>alert('Request Sent');</script>";
									}
									else
									{
										echo"<script>alert('Try Again');</script>";
									}
								}
				}
		?>