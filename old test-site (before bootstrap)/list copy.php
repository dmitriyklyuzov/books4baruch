<?php
session_start();
$_SERVER['pageName'] = "ADD LISTING";

// if a user is not logged in, redirect to login.php
include 'controller/redirectIfNotLoggedIn.php';
redirectIfNotLoggedIn();

?>
<!DOCTYPE html>
<html>
<head>
    <!--include head-->
  <?php include 'head.php' ?>
  <title>Add a listing</title>
</head>
<body>
  <?php include 'navigationbar.php';?>
</br>
  <h1 style="text-align: center">Books4Baruch</h1>
    <h3 style="text-align: center">Add a listing</h3>
      <div class="auto-style1">
        <form id="newListingForm" action="controller/addlisting.php" method="POST">

            <!-- <label class="list_label" style="text-align:left" for="title">Title</label></br> -->
            <input type="text" name="title" placeholder="Title" autofocus="" style="width: 171px">
            </br></br>
            <!-- <label for="title">Author</label></br> -->
            <input type="text" name="author" placeholder="Author" style="width: 171px">
            </br></br>
            <!-- <label for="title">ISBN Number</label></br> -->
            <input type="text" name="ISBN" placeholder="ISBN" style="width: 171px">
            </br></br>
            <input type="text" name="publisher" placeholder="Publisher" style="width: 171px">
            </br></br>
            <input type="text" name="edition" placeholder="Edition #" style="width: 171px">
            </br></br>
            <input type="text" name="condition" placeholder="Condition - 1 to 10" style="width: 171px">
            </br></br>
            <input type="text" name="price" placeholder="Price" style="width: 171px">
            </br></br>
            <textarea form="newListingForm" name="description" rows="4" style="width: 171px"></textarea>
            </br></br>
            <input type="submit" value="ADD">
          
          </form>
        </div>
    </body>
</html>
