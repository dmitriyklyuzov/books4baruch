<nav class="navbar navbar-inverse " style="background-color: #0D333E;">
	<div class="container-fluid" style="width: 95%">
		<div class="navbar-header">
			<button style="border-color: #0D333E;" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>
			
			<a class="navbar-brand" style="color:white" href="index.php"><span class="glyphicon glyphicon-home"></span> Books4Baruch<sup class="color-orange">Beta</sup></a>
		</div>
		
		<div class="collapse navbar-collapse" id="myNavbar">
			
			<ul class="nav navbar-nav navbar-right">

				<li><a href="list.php"><span class="glyphicon glyphicon-paperclip"></span> ADD LISTING</a></li>

				<?php

            		if(isset($_SESSION['logged_in'])){
						if($_SESSION['logged_in']=='true'){
							
							include 'controller/student.php';

							echo "<li><a href='mylistings.php'><span class='glyphicon glyphicon-heart'></span> MY LISTINGS</a></li>";

							echo "<li class='hidden-lg hidden-md hidden-sm'><a href='status.php'><span class='glyphicon glyphicon-user'></span> MY PROFILE</a></li>";

							echo "<li class='hidden-lg hidden-md hidden-sm'><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> LOG OUT</a></li>";

							echo '<li class="dropdown hidden-xs">
			      					<a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user"></span> HI, '.strtoupper(getFirstName()).'
			      					<span class="caret"></span></a>
			      					<ul class="dropdown-menu">
			          					<li><a href="status.php">MY PROFILE</a></li>
			          					<li><a href="logout.php">LOG OUT</a></li>
			        				</ul>
			      				</li>';
						}
					}

					else{

						echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> SIGN UP</a>";

						echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> LOG IN</a>";
					}
				?>
			    </ul>
			</div>
	</div>
</nav>