<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&family=Merriweather:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:ital,wght@0,800;0,900;1,800;1,900&family=Poppins:wght@100&family=Roboto+Mono:ital,wght@0,100;0,400;0,500;0,700;1,500&display=swap" rel="stylesheet">
    <title>Social NetWork</title>
</head>
<body>
    <div class="box">
        <h2 class="h2">
            Social NetWork
        </h2>
        <form action="login.php" method="post" class="form">
            <?php
                if(isset($_SESSION['error'])){
                        echo"<span class='error>" . $_SESSION['error'] . "</span>";
                };
                unset($_SESSION['error']);
            ?>
            <input type="text" name="user" id="user" class="input" placeholder="Insira seu usuário aqui">
            <button type="submit" class= "btn">Entrar</button>

        </form>
    </div>
    
</body>
</html>