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
				
				Requests you have sent for blood
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							
							<th>Name of the Blood Bank (Hosputal)</th>
							<th>Request Status</th>
							
							
						</thead>
			<?php
				$sql = "SELECT * FROM request WHERE rid = '$newId' ";
				$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
					while($row=mysqli_fetch_array($res))
								
						{
							?>		
					
						<tbody>
							<td><?php echo $row['bbname'] ;?></td>
							<td><?php echo $row['reqstatus'] ;?></td>
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
		