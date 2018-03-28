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

<body>

<?php include 'hnavbar.php' ; ?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				
				Requests you got for blood
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							
							<th>Name of the Receiver</th>
							<th>Receiver's Email Id</th>
							<th>Request Status</th>
							<th>Action Required</th>
							
							
						</thead>
			<?php
				$sql = "SELECT * FROM request WHERE hid = '$newId' ";
				$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
					while($row=mysqli_fetch_array($res))
								
						{
							?>		
					
						<tbody>
							<td><?php echo $row['recname'] ;?></td>
							<td><?php echo $row['recemail'] ;?></td>
							<td><?php echo $row['reqstatus'] ;?></td>
							<td><a href="raccept.php?id=<?php echo $row['rid']; ?>" class="btn btn-success">Accept</a> / 
							<a href="rcancle.php?id=<?php echo $row['rid']; ?>" class="btn btn-danger">Cancle</a></td>
						</tbody>
						
						
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
		}
		else
		{
				echo'<script>';
				echo 'alert("Please Log in again!");';
				echo 'window.location.href="index.php";';
				echo '</script>';
		}
		?>
		