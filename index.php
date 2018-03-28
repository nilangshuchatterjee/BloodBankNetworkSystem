<?php include 'head.php' ; 
include 'connection.php' ; 

?>

<body onload="ld()">

<script>
	
	function ld()
	{
		document.search_box.search.focus();
		
	}
</script>



<nav class="navbar navbar-default" style="background:#FF5733;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=""><font color="White" size="+2">BloodBank</a></font>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
        <li><a href="" data-toggle="modal" data-target="#hospitalModal"><font color="White">Hospitals</a></font></li>
       
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="" data-toggle="modal" data-target="#receiverModal"><font color="White">Receivers</a></font></li>
       
      </ul>
		
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Details of Available Blood Samples with Blood Bank and Hospitals
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							
							<th>Blood Sample (Group)</th>
							<th>Blood Type</th>
							<th>Blood Bank (Hospital)</th>
							<th>Location</th>
							<th>Request Sample</th>
						</thead>
					<?php
				$sql = "SELECT * FROM addblood ";
				$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
				
					while($row=mysqli_fetch_array($res))
								
						{
							?>		
					
						<tbody>
							<td><?php echo $row['bgroup'] ;?></td>
							<td><?php echo $row['btype'] ;?></td>
							<td><?php echo $row['bhname'] ;?></td>
							<td><?php echo $row['bhloc'] ;?></td>
							<td><a href="#requestModal" class="btn btn-info" data-toggle="modal" title="You have to Sign In first">Request</a></td>
						
						</tbody>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		
	<div
	</div>
<br><br><br><br>
	<?php include 'footer.php'; ?>


		<!-- Modal Receivers-->
			<div id="receiverModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Receivers are requested to log in</h4>
				  </div>
				  <div class="modal-body">
						<form action="rlogin.php" method="post">
							  <div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" name="rlogemail" class="form-control" placeholder="Enter your registered email">
								
							  </div>
							  <div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" name="rlogpass" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							  
							  <button type="submit" name="rlogSubmit" class="btn btn-primary">Sign In</button>
						</form>
						
						<br>
						<p>
						  <a  data-toggle="collapse" href="#collapseReceiver" role="button" aria-expanded="false" aria-controls="collapseReceiver">
							New Here? Register
						  </a>
						
						</p>
						<div class="collapse" id="collapseReceiver">
						  <div class="card card-body">
							<div class="panel panel-primary">
								<div class="panel-heading">
									Register if You are a new user
								</div>
								<div class="panel-body">
									<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
										  <div class="form-group">
											<label for="exampleInputEmail1">Full Name</label>
											<input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter email">
										  </div>
										  <div class="form-group">
											<label for="exampleInputPassword1">Email Id</label>
											<input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Password">
										  </div>
										  <div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
										  </div>
										  <div class="form-group">
											<label for="exampleInputPassword1">Blood Group</label>
											<input type="text" class="form-control" name="bgroup" id="exampleInputPassword1" placeholder="Password">
										  </div>
										 
										  <button type="submit" name="receiverSubmit" class="btn btn-primary">Sign Up</button>
									</form>
								</div>
							</div>
						  </div>
						</div>
				  </div>
						
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
		<!-- Modal Receivers-->
		
		
		<!-- Modal hospitals-->
			<div id="hospitalModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Hospital authorities are requested to log in</h4>
				  </div>
				  <div class="modal-body">
						<form action="hlogin.php" method="post">
							  <div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" name="hlogemail" placeholder="Enter email">
								
							  </div>
							  <div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" name="hlogpass" placeholder="Password">
							  </div>
							 
							  <button type="submit" name="hlogSubmit" class="btn btn-primary">Sign In</button>
						</form>
						<br>
						<p>
						  <a  data-toggle="collapse" href="#collapseHospital" role="button" aria-expanded="false" aria-controls="collapseHospital">
							New Here? Register
						  </a>
						
						</p>
						<div class="collapse" id="collapseHospital">
						  <div class="card card-body">
							<div class="panel panel-primary">
								<div class="panel-heading">
									Register if You are a new user
								</div>
								<div class="panel-body">
									<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
										  <div class="form-group">
											<label for="exampleInputEmail1">Name of the Blood Bank (Hospital)</label>
											<input type="text" class="form-control" name="hname"  placeholder="Enter Hospital name">
										  </div>
										 
										  <div class="form-group">
											<label for="exampleInputPassword1">Location</label>
											<input type="text" class="form-control" name="hloc" placeholder="Location of the blood bank(hospital)">
										  </div>
										  <div class="form-group">
											<label for="exampleInputPassword1">Email</label>
											<input type="email" class="form-control" name="hemail" placeholder="Enter a valid email">
										  </div>
										  <div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" name="hpass" placeholder="Password">
										  </div>
										  
										  <button type="submit" name="hospitalSubmit" class="btn btn-primary">Sign Up</button>
									</form>
								</div>
							</div>
						  </div>
						</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
		<!-- Modal hospitals-->
		
		<!-- Modal Request button-->
			<div id="requestModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">To access this button you have to Sign In first as a Receiver</h4>
				  </div>
				  <div class="modal-body">
						<form action="rlogin.php" method="post">
							  <div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" name="rlogemail" class="form-control" placeholder="Enter your registered email">
								
							  </div>
							  <div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" name="rlogpass" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							  
							  <button type="submit" name="rlogSubmit" class="btn btn-primary">Sign In</button>
						</form>
						
						<br>
						<p>
						  <a  data-toggle="collapse" href="#collapseRequest" role="button" aria-expanded="false" aria-controls="collapseRequest">
							New Here? Register
						  </a>
						
						</p>
						<div class="collapse" id="collapseRequest">
						  <div class="card card-body">
							<div class="panel panel-primary">
								<div class="panel-heading">
									Register if You are a new user
								</div>
								<div class="panel-body">
									<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
										  <div class="form-group">
											<label for="exampleInputEmail1">Full Name</label>
											<input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter email">
										  </div>
										  <div class="form-group">
											<label for="exampleInputPassword1">Email Id</label>
											<input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Password">
										  </div>
										  <div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
										  </div>
										  <div class="form-group">
											<label for="exampleInputPassword1">Blood Group</label>
											<input type="text" class="form-control" name="bgroup" id="exampleInputPassword1" placeholder="Password">
										  </div>
										  
										  <button type="submit" name="receiverSubmit" class="btn btn-primary">Sign Up</button>
									</form>
								</div>
							</div>
						  </div>
						</div>
				  </div>
						
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
		<!-- Modal Request button-->


</body>
</html>

<?php
		
		include 'connection.php';
		
		
		//script for receivers
		
		if(isset($_POST['receiverSubmit']))
		
				{
					$name=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name']));
					
					$email=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
					
					$bgroup=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['bgroup']));
					
					$password=htmlspecialchars(mysqli_real_escape_string($conn, password_hash( $_POST['password'],PASSWORD_BCRYPT)));
					
					date_default_timezone_set('Asia/Kolkata');
					$regtime = date('d-m-y h:i:s a', time());
					
					
						$sql1="SELECT * FROM receivers WHERE email = '$email'"; //query-1
							$rs1=mysqli_query($conn,$sql1) or die("Error: ".mysqli_error($conn));
							if(mysqli_num_rows($rs1) > 0) // the condition if there is no result regarding the search.
								{
									echo "<script>alert('Your have already registered!');</script>" ;
												
								}
							else
								{
										$sql2="INSERT INTO receivers (rid,name,email,password,bgroup,regtime) VALUES('','$name','$email','$password','$bgroup','$regtime')" ;
										$rs2= mysqli_query($conn, $sql2) or die("Error: ".mysqli_error($conn));
										if($rs2)
											{
												
												echo "<script> alert('You have registered successfully. Thank You!')</script>";
											}
											else
											{
												echo "<script>alert('Something wrong! Please try again./কিছু প্রযুক্তিগত কারনে আপনার রেজিসট্রেশন সম্পুর্ণ হলনা, কিছু সময় পর আবার চেষ্টা করুন।')</script>";
											}	
								}
								
					
							
					
				}
				
				//script for hospitals
				if(isset($_POST['hospitalSubmit']))
		
				{
					$hname=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hname']));
					
					$hloc=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hloc']));
					
					$hemail=htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hemail']));
					
					$hpass=htmlspecialchars(mysqli_real_escape_string($conn, password_hash( $_POST['hpass'],PASSWORD_BCRYPT)));
					
					date_default_timezone_set('Asia/Kolkata');
					$htime = date('d-m-y h:i:s a', time());
					
					
						$hsql1="SELECT * FROM hospitals WHERE hemail = '$hemail'"; //query-1
							$hrs1=mysqli_query($conn,$hsql1) or die("Error: ".mysqli_error($conn));
							if(mysqli_num_rows($hrs1) > 0) // the condition if there is no result regarding the search.
								{
									echo "<script>alert('Your have already registered!');</script>" ;
												
								}
							else
								{
										$hsql2="INSERT INTO hospitals (hid,hname,hloc,hemail,hpass,htime) VALUES('','$hname','$hloc','$hemail','$hpass','$htime')" ;
										$hrs2= mysqli_query($conn, $hsql2) or die("Error: ".mysqli_error($conn));
										if($hrs2)
											{
												
												echo "<script> alert('You have registered successfully. Thank You!')</script>";
											}
											else
											{
												echo "<script>alert('Something wrong! Please try again./কিছু প্রযুক্তিগত কারনে আপনার রেজিসট্রেশন সম্পুর্ণ হলনা, কিছু সময় পর আবার চেষ্টা করুন।')</script>";
											}	
								}
								
					
							
					
				}
					
	?>