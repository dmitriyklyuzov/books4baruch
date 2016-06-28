<?php

session_start();

include 'controller/student.php';

$email=getEmail();

if(isset($_SESSION))

?>
<!DOCTYPE html>
<html>
<head>
    <title>Great!</title>
    <style type="text/css">
        .auto-style1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Books4Baruch</h2>
    <br/>
    <br/>
    <h1 class="auto-style1">Success!</h1>
    <p class="auto-style1">You just listed a book!</p>
    <p class="auto-style1">
        <form class="auto-style1" action="results.php" method="POST">
            <input name="searchbox" id="searchbox" type="text" value="<?php echo $email;?>"
                    style="display:none"/>
            <input type="submit" name="MyListings" value="See your listings"></input>
        </form>
    <!-- <button type="button" action="login.php">Return to Login Page</button> -->
    </p>
</body>
</html>
