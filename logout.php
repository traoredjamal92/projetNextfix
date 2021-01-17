<?php session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>log out</title>
</head>
<body>


   <div class="logo">
       <img src="images/logo.png" alt="">
   </div>

    <div class="wrapper">
    
        <div class="title">logout</div>

    
            
            <div class="input_fild">
                <h3>Session ended.</h3><br>
            </div>
            <div class="input_fild">               
                <p>If you wanna you can log in at following link:  </p><br>              
            </div>
            <div class="input_fild">               
                <form action="login.php">
                    <input type="submit" value="Log in" />
                </form>
            </div>
            
            
            
        
    </div>
        

</body>
</html>