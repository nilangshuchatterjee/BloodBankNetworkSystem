<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informations</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">


</head>

<body onload="ld()">

 <script>
	
	function ld()
	{
		document.user.n_title.focus();
		
	}
</script> 
	
    <div class="container">
    <br>
    
    	<center><h2 style="color:#5D4793"><b>Enter The Information about you and you know about Suri/Birbhum</b></h2>
        	<p style="color:red;"><b>*Please do not abuse. Enter CORRECT INFORMATION. Don't misslead other people!*</b></p>
            <hr>
            
            </center>
            
            	<form class="form" name="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                
                	<div class="form-group"><br>
                    
                    	<div class="row">
                        
                        	<lebel class="col-sm-2" for="ntitle">Name/Title</lebel>
                            
                            <div class="col-sm-10">
                            
                            	<input type="text" class="form-control" id="ntitle" name="n_title" placeholder="Enter your Name or a Title of your Information" required="required">
                            
                            
                            </div>
                            
                      </div>
                    
              	 </div>
                 
                 <div class="form-group"><br>
                    
                    	<div class="row">
                        
                        	<lebel class="col-sm-2" for="wlink">Website link</lebel>
                            
                            <div class="col-sm-10">
                            
                            	<input type="text" class="form-control" id="wlink" name="weblink" placeholder="Enter a Website Link if you have any" required="required">
                            
                            
                            </div>
                            
                      </div>
                    
              	 </div>
                 
                 <div class="form-group"><br>
                    
                    	<div class="row">
                        
                        	<lebel class="col-sm-2" for="desc">Description</lebel>
                            
                            <div class="col-sm-10">
                            
                            	<textarea class="form-control" id="desc" name="description" placeholder="Enter a description along with location/address" required="required"></textarea>
                                
                            
                            
                            </div>
                            
                      </div>
                    
              	 </div>
                 
                 <div class="form-group"><br>
                    
                    	<div class="row">
                        
                        	<lebel class="col-sm-2" for="keyntags">Keywords/Tags</lebel>
                            
                            <div class="col-sm-10">
                            
                            	<textarea class="form-control" id="keyntags" name="keywords" placeholder="Enter Keywords or Tags" required="required"></textarea>
                                
                            
                            
                            </div>
                            
                      </div>
                    
              	 </div>
                 
                
                 
                 
                 <div class="form-group"><br>
                 
                 	<div class="row">
                    	<center>
                    	<input type="submit" class="btn btn-outline-success" name="submit" value="Save">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" class="btn btn-outline-secondary" name="cancel" value="Cancel">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="btn btn-outline-primary">
                		<a href="index.php">Hello!Suri</a>
                		</div>
                        
                        </center>
                    </div>
                 
                 </div>
                   
                </form>
                
           </div>
           
	<div class="_hq _ih" id="fbar"> <div class="fbar"> 
  <span id="fsr">  
    &copy 2017 &nbsp<a class="_Sh" href="index.php"><font color="red">HelloSuri</font></a>     
  </span> 
  <span id="fsl"> 
    <a class="_Sh" href="advertise.php">Advertising</a>  
    <a class="_Se" href="about.php">About</a> 
    <a class="_Se" href="contact.php">Contact</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a class="_Sh" href="terms.php">Terms &amp Condition</a>
  </span>  
  </div>  
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>
</html>

<?php

		$conn = mysqli_connect("localhost","root","") or die("Could not connect");			//localhost=server name,root=user name,here pasword is blank.
		
		$db = 'searchengine';
		mysqli_select_db($conn,$db) or die("No db");
		
		

		if(isset($_POST['submit']))
		
				{
					$title=$_POST['n_title'];
				 $link=$_POST['weblink'];
				 $description=$_POST['description'];
				 $keywords=$_POST['keywords'];
				
				
			
		
			
				$sql="INSERT INTO dbtable(title,link,description,keywords) VALUES('$title','$link','$description','$keywords')" ;
			
			if(mysqli_query($conn,$sql))
					{
						echo "<script> alert('Thank you for your Information and support.')</script>";
					}
					else
					{
						echo "<script>alert('Something wrong! Please try again.')</script>";
					}
					
				}
					
	?>