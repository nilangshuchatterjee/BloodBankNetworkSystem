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
      <a class="navbar-brand" href="bankdashboard.php"><font color="White"><font color="White" size="+2"><?php echo $row['hname'] ;?></font></a></font>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php"><font color="White">Log Out</a></font></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="hrequest.php"><font color="White">Requests</a></font></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="bloodsample.php"><font color="White">Add Blood Sample</a></font></li>
		</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>