<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subscribe.css">
    <title>Document</title>
</head>
<body>
    
    <div class="logo">
       <img src="images/logo.png" alt="">
   </div>

<div class="wrapper">
        <div class="title">
            SIGN UP
        </div>

        <form class="form" method="POST" action="">
            <div class="input_fild">
                <label for="fname">first name</label>
                <input name="fname" type="text" class="input" id="fname" required>
            </div>
            <div class="input_fild">
                <label for="lname">last name</label>
                <input name="lname" type="text" class="input" id="lname" required>
            </div>
            <div class="input_fild">
                <label for="email1">email address</label>
                <input name="email1" type="email1" class="input" id="email1" required>
            </div>
            <div class="input_fild">
                <label for="pass1">password</label>
                <input name="pass1" type="password" class="input" id="pass1" required>
            </div>
            <div class="input_fild">
                <label for="pass2">confirm password</label>
                <input name="pass2" type="password" class="input" id="pass2" required>
            </div>

            <input type="submit" name="submit" value="Subscribe" style="width:auto">
            <a href="login.php" style="margin-left: 20%">Log in</a>
            <br>

            <?php include 'includes/includesubscribe.php'; ?>
        </form>
    </div>
    </body>
</html>