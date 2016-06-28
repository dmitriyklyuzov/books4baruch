<div class="navbar-wrapper" style="margin-bottom: 40px;">
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
        <h1 class="brand"><a href="index.php">Books4Baruch<a href="status.php"><sup style="color:#f0bf00">Beta</sup></a></a></h1>
        <nav class="pull-right nav-collapse collapse">
          <ul id="menu-main" class="nav">

            <?php

            if(isset($_SESSION['logged_in'])){
					//if "logged_in" is set to "true"
					if($_SESSION['logged_in']=='true'){
						echo "<li><a title='mylistings' href=mylistings.php>MY LISTINGS</a></li>";
					}
				}
			?>

			<li><a title="addlisting" href="list.php" -->ADD LISTING</a></li>

			<?php


			//check if "logged_in" variable is set
				if(isset($_SESSION['logged_in'])){
					//if "logged_in" is set to "true"
					if($_SESSION['logged_in']=='true'){
						
						include 'student.php';
						
						echo "<li><a href='logout.php'>HI, ".strtoupper(getFirstName())." (LOG OUT)</a></li>";

						
					}
				}
				//otherwise, give an option to log in
				else{
					include 'student.php';
					echo "<li><a href='signup.php'>SIGN UP</a>";

					echo "<li><a href='login.php'>LOG IN</a>";
					
				}
				
				?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>