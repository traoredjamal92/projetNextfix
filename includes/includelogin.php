
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




if(isset($_POST['login']))
{

    extract($_POST);

   
        
    include 'database.php';
    global $db;

    

    if(!empty($mail) && !empty($pass))
    {
        
        $q = $db->prepare("SELECT * FROM users WHERE email = :email");
            $q->execute([
                'email'=>$mail]);

            $result = $q->fetch(); 
            
            if($result == true)
            {
            if(password_verify($pass, $result["pass"])){
                session_start();
                $_SESSION['firstname']=$result['firstname'];
                header('Location: http://localhost:8888/Nextflix/index.php');
                exit();
            }else {
                echo "le mot de passe est incorect";
            }
        }else{
            echo "le compte $mail n'existe pas";
        }
    }else{
        echo "Veuillez remplir tous les champs.";
    }
}

?> 