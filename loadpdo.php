<?php 
    try {
        $bd="mysql:host=localhost;dbname=mglsi_news";
        $user="mglsi_user";
        $pwd="passer";
        $pdo = new PDO($bd,$user,$pwd);
    } catch (PDOException $e) { 
        echo $e->getMessage();
    }
?>
