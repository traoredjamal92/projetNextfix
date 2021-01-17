<?php
    include("secretInfo.php");
    $userData = userData;
    $userPass = "";
    define('HOST','localhost'); 
    define('DATABASE','nextflix'); 

    try {
    $db = new PDO("mysql:host=".HOST.";dbname=".DATABASE,$userData,$userPass);
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
};

?>