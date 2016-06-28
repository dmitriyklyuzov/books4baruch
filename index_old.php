<?php 
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Home | Books4Baruch</title>
<?php
include "head.php"
?>
</head>
<body>

<?php 

include "controller/navigationBar.php";

?>

<!-- Dmitriy - removed the breaks to bring the search box and button higher up -->
<!-- </br>
</br>
</br>
</br> -->
<div id="top"></div>
<div id="headerwrap">
  <header class="clearfix">
    <center><h1 class="multi-line-header">Welcome to Books4Baruch!</h1></center>
    <div class="container">
      <div class="row">
        <div class="span12">
          <center>
          <form class="search_form" id="index_search_form" method = "GET" action="results.php">
              <input name="s" id="searchbox" class="searchbox" placeholder="Book Title, Author or ISBN" type="text" autofocus="" style="margin: 0; width: 50%"; />
  		        <input type="submit"re value="Search" style="margin: 0; width: 160px; height: 45px";/>
          </form>
          </center>
        </div>
      </div> <!-- row -->
    </div><!-- container -->
  </header>
</div>
<section id="team" class="single-page scrollblock">
  <div class="container">
    <!-- <div class="align"><i class="icon-group-circled"></i></div> -->
    <center><h1>Meet the team</h1></center>
    <div class="row" align="left">
      <div class="span2">
        <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-1.jpg" alt=""> </div>
        <h3>Dmitry</h3>
        <div class="job-position">Team Leader | Back-End Developer</div>
      </div>
      <div class="span2">
        <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-2.jpg" alt=""> </div>
        <h3>Eldon</h3>
        <div class="job-position">Database Designer</div>
      </div>
      <div class="span2">
        <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-3.jpg" alt=""> </div>
        <h3>Albina</h3>
        <div class="job-position">Database Designer</div>
      </div>
      <div class="span2">
        <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-4.jpg" alt=""> </div>
        <h3>Chris</h3>
        <div class="job-position">Graphic Designer</div>
      </div>
      <div class="span2">
        <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-2.jpg" alt=""> </div>
        <h3>Yana</h3>
        <div class="job-position">Back-End Developer</div>
      </div>
       <div class="span2">
        <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-4.jpg" alt=""> </div>
        <h3>Ilya</h3>
        <div class="job-position">Web Developer</div>
      </div>
    </div>
    <div class="row">
      <div class="span10 offset1">
        <hr class="featurette-divider">
        <div class="featurette">
          <h2 class="featurette-heading">A little about us<!-- <span class="muted">| a little about us</span> --></h2>
          <div class="span7 offset1">
            <p style="text-align:left; line-height: 25px; font-weight: 300" >It’s always a struggle to get rid of used books and our team hopes to resolve that problem by offering this site as an option. Our mission is to provide Baruch students with a free platform to post listings of books in an effort to buy, sell, or trade books to other fellow Baruch students. Hopefully, students can earn some income while freeing up some well-needed space using Books4Baruch!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>
<div class="footer-wrapper">
  <div class="container">
    <center><footer><small>&copy; 2016 Books4Baruch.com. All rights reserved.</small></footer></div></center>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/site.js"></script>
</body>
</html>
