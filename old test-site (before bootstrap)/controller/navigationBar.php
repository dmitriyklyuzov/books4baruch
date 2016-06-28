<div id="navigation">
		<ul id="nav_links">
			<?php

			echo "<li><a href=index.php>HOME</a></li>";

			echo "<li><a href=list.php>ADD LISTING</a></li>";

			if(isset($_SESSION['logged_in'])){
					//if "logged_in" is set to "true"
					if($_SESSION['logged_in']=='true'){
						echo "<li><a href=results.php?>MY LISTINGS</a></li>";
					}
				}

			?>
			<li style="float:right">
				<?php
				//check if "logged_in" variable is set
				if(isset($_SESSION['logged_in'])){
					//if "logged_in" is set to "true"
					if($_SESSION['logged_in']=='true'){
						
						include 'student.php';
						// $firstName = 
						echo "<a href='controller/logout.php'>HI, ".strtoupper(getFirstName())."</a>";

						// //give an option to log out
						// echo "<a href='controller/logout.php'>LOG OUT</a>";
					}
				}
				//otherwise, give an option to log in
				else{
					echo "<a href='login.php'>LOG IN</a>";
					// $_SESSION['cairo_svg_version_to_string(version)ted_index']='true';
				}
				?>

			</li>
		</ul>
	</div>
	<?php
		function checkPageName($pageIdArgs, $linkName){
			if($_SERVER['pageName']!=$pageIdArgs){
				echo "<li><a href=".$linkName.">".$pageIdArgs."</a></li>";
			}
		}
	?>