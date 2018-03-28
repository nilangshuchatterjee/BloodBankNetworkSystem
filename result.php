<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Results</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>


<style>

	.result
	{
		margin-left:235px;
		margin-right:235px;
		margin-top:12px;
	}
	element.style {
}
._hq {
bottom: 0;
left: 0;
position: absolute;
right: 0;
}
user agent stylesheetdiv {
display: block;
}
Inherited from div#footer.ctr-p
#footer {
bottom: 0;
font-size: 10pt;
height: 35px;
position: absolute;
width: 100%;
}
Inherited from body#gsr.hp.vasq
body, html {
font-size: small;
}
body {
background: #fff;
color: #222;
}
body, td, a, p, .h {
font-family: arial,sans-serif;
}
Inherited from html
body, html {
font-size: small;
}
#fsl{margin-left:30px}#fsr{margin-right:30px}.fmulti #fsl{margin-left:0}.fmulti #fsr{margin-right:0}
.fmulti{}._hq{bottom:0;left:0;position:absolute;right:0}._zi{background:#f2f2f2;bottom:0;left:0;position:absolute;right:0;-webkit-text-size-adjust:none}.fbar p{display:inline}.fbar a,#fsettl{text-decoration:none;white-space:nowrap}.fbar ._Se{padding:0 0 0 27px !important;margin:0 !important}.fbar ._Sh{padding:0 !important;margin:0 !important}._ih a:hover{text-decoration:underline}._hd img{margin-right:4px}._hd a,._zi #swml a{text-decoration:none}.fmulti{text-align:center}.fmulti #fsr{display:block;float:none}.fmulti #fuser{display:block;float:none}#fuserm{line-height:25px}#fsr{float:right;white-space:nowrap}#fsl{white-space:nowrap}#fsett{background:#fff;border:1px solid #999;bottom:30px;padding:10px 0;position:absolute;box-shadow:0 2px 4px rgba(0,0,0,0.2);-webkit-box-shadow:0 2px 4px rgba(0,0,0,0.2);text-align:left;z-index:100}#fsett a{display:block;line-height:44px;padding:0 20px;text-decoration:none;white-space:nowrap}._ih #fsettl:hover{text-decoration:underline}._ih #fsett a:hover{text-decoration:underline}._Qb{color:#777}._bc{color:#222;font-size:14px;font-weight:normal;-webkit-tap-highlight-color:rgba(0,0,0,0)}._bc:hover,._bc:active{color:#444}._ae{display:inline-block;position:relative}._Cc,._sd{height:13px;width:8px}._Cc:before,._sd:before{border:8px solid rgba(255,255,255,0);border-radius:8px;content:'';position:absolute}._Cc:before{border-left:8px solid #777;left:1px}._sd:before{border-right:8px solid #777;left:-9px}._Cc:after,._sd:after{border:12px solid rgba(255,255,255,0);content:'';position:absolute;top:-4px}._Cc:after{border-left:10px solid #f6f6f6;left:-4px}._sd:after{border-right:10px solid #f6f6f6;left:-10px}._ak ._Cc:after{border-left:10px solid white}._ak ._sd:after{border-right:10px solid white}._bc{padding:8px 16px;margin-right:10px}._Qb{margin:40px 0}._Qg{margin-right:10px}._iq{margin-left:135px}.fbar{background:#f2f2f2;border-top:1px solid #e4e4e4;line-height:40px;min-width:980px}._gq{margin-left:135px}.fbar p,.fbar a,#fsettl,#fsett a{color:#777}.fbar a:hover,#fsett a:hover{color:#333}.fbar{font-size:small}#fuser{float:right}

</style>
</head>


<body>
		<div class="container-fluid">
        	<form action="result.php" method="get">
                <div class="row" style="background:#f2f2f2;">
                    	<div class="col-sm-1">
                    	<a href="index.php"><img src="images/suri.png" height="75px" width="200px"></a>
                    	</div>
                        <div class="col-sm-6">
                            <div class="input-group" style="margin-left:120px;margin-top:15px;">
                            	<input type="text" class="form-control" name="search">
                                <span class="input-group-btn">
                                  <input type="submit" value="Go" class="btn btn-group-secondary" name="search_button" />
                         		</span>
                            </div>
                        </div>
            	</div>
            </form>
            
            <div class="result">
            <table>
            	<tr>
                	<?php
						$conn = mysqli_connect("localhost","root","");
						mysqli_select_db($conn,"searchengine");
						if(isset ($_GET['search_button']))
						{
							$search=$_GET['search']; //search is the name of the search box in index.php page. Here I define the variable.
							if($search=="")
							{
								echo "<center>Didn't search anything yet!!!</center>";
								exit();
							}
							$query="SELECT * FROM donor WHERE bgroup LIKE '%$search%' AND city LIKE '%search%'"; //query-1
							$rs=mysqli_query($conn,$query);
							if(mysqli_num_rows($rs)== null) // the condition if there is no result regarding the search.
							{
								echo "<center><h2><b>Sorry! No result found related the search words. Try another words to search</b></h2></center>" ;
								
							}
							else
						
							{
								
								
							
								while($row=mysqli_fetch_array($rs))
								{
									echo "<a href='$row[7]' target='_blank'><font size='5' color='#0000cc'><b>$row[2]</b></font></a><br>";
									echo "<font size='4' color='#006400'>$row[3]</font><br>";
									echo "<font size='3' color='#666666'>$row[4]</font><br>";
									echo "<font size='3' color='#666666'>$row[5]</font><br>";
									echo "<font size='3' color='#666666'>$row[6]</font><br>";
									echo "<font size='3' color='#666666'>$row[8]</font><br>";
								}
							}
						}
					?>
				</tr>
			</table>
            </div>
            
            
                        
                        
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

            
            
            
            
            
            	
                
                                </div>
</div>

</body>
</html>