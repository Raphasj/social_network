<?php
session_start();
require('connect.php');

try{
    $stmt = $conn->prepare("INSERT INTO posts(post, user_id) VALUES(?,?)");
    $stmt->bindParam(1, $_POST['post'], PDO::PARAM_STR);
    $stmt->bindParam(2, $_SESSION['id_logged'], PDO::PARAM_INT);


    if($stmt->execute()){
        $_SESSION['sucess'] = "Post Enviado.";
        header("Location: home.php");
    }
    else {
        $_SESSION['error'] = "Post não Enviado.";
        header("Location: home.php");
    }

}catch(PDOException $e){
    echo $e-> getMessage();

}