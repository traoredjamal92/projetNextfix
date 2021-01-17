<?php session_start();
$login="login.php";
$subscribe="subscribe.php";
$msg = "";
if (isset($_SESSION['firstname'])) {
    $name = $_SESSION['firstname'];

    $msg = '<li class="nav-item"><a class="nav-link text-danger disabled" href="#">Welcome '.$name.'</a></li>';
}else {
    header("location: login.php");
    // $msg = '<li class="nav-item"><a class="nav-link text-danger" href="'.$login.'">Log in</a></li><li class="nav-item"><a class="nav-link text-danger" href="'.$subscribe.'">Subscribe</a></li>';
}

if(isset($_POST['logout'])){ //logging out
    session_destroy();
    header("location: logout.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>

    <nav class="navbar navbar-expand-lg  navbar-expand-sm navbar-dark" style="background-color: #2d2d2d;">
        <a class="navbar-brand" href="#"><img src="./images/logo.png" href="#" alt="Nextflix logo"></a>
        <button class="navbar-toggler" type="button" class="btn btn-danger" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php">Movies</a>
                        <a class="dropdown-item" href="series.php">Series</a>  
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">contact</a>
                </li>
                <?php echo $msg; ?>
                    
            </ul>
            <form method="POST" class="form-inline my-2 my-lg-0">
                <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <div class="btn-toolbar">
                    <button id="goSearch" type="button" class="btn btn-danger" style="background-color: #761313;">search</button>
                </div>
                <div class="btn-toolbar">
                    <button name="logout" type="submit" class="btn btn-danger" style="background-color: #761313; margin-left: 9px;">log out</button>
                </div>
            </form>
        </div>
    </nav>


    <div class="container">
        <h1>Contactez-nous</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>  
            <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" type="text" class="form-control">
            <small id="emailHelp" class="form-text text-muted">entrez votre adresse mail</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">message:</label>
                <textarea name="msg" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <style>
        body{
            background-color:  #414141;
            color: white;
            text-align: center;

        }
        .container{
            width: 60%;
            margin: auto;
        }
    </style>

</body>
</html>

<?php 

if(isset($_POST['msg'])){

    $pdo = new PDO('mysql:host=localhost;dbname=nextflix','root',''); // connection 

    $mail = $_POST['email'];
    $msg = $_POST['msg'];

    $q = "INSERT INTO messages(mail,messages) VALUES ('$mail','$msg')";
    $r = $pdo->prepare($q);
    $r->execute();

    echo "votre message est bien envoyé.";
}

?>
