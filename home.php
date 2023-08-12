<?php

    session_start();
    require('connect.php');
    if(!isset($_SESSION['user_logged'])) {
        header("Location:index.php");
    }

    try{
        $stmt = $conn->prepare("SELECT p.id, p.post, u.user FROM posts p JOIN users u ON p.user_id = u.id ORDER BY p.id desc");
        $stmt->execute();
        $posts = $stmt->fetchAll();
    }
    catch(PDOException $e){
        echo $e-> getMessage();
    }

    


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
    <div class="box-home">
        <h3 class="h3">Olá usuário, <?php echo  ucfirst($_SESSION['user_logged']) ?></h3>
        <?php  
            if(isset($_SESSION['sucess'])){
                echo'<span class="sucess">' . $_SESSION['sucess'] . '</span>';
            }


            if(isset($_SESSION['error'])){
                echo'<span class="error">' . $_SESSION['error'] . '</span>';
            }


            unset($_SESSION['sucess']);
            unset($_SESSION['error']);
        ?>


        <form action="post.php" method="post" class="form-post">
            <textarea name="post" id="post" class="input" placeholder="No que você está pensando? "></textarea>
            <button type= "submit"class="btn btn-post"> Postar</button>
        </form>
        <div class="posts">
            <?php  
                foreach($posts as $post ){
                    $stmt = $conn->prepare("select count(*) as likes from ");
                }
            ?>
            <div class="post">
                <p class="user"> <?php echo $post['user']; ?> </p>
                <p class="text-post"> <?php echo $post['post']; ?></p>
                <div class="items">
              
                    <ul>
                        <li>
                            <form action="like.php" method="post">
                                <input type="hidden" name="post_id" value= "<?php echo $post['id']; ?>">
                                <button type="submit" class="btn-like">Like</button>
                            </form>
                        </li>
                    </ul>
                </div>
              
                <div class="comments">
                    <p class="title-comments">Comentários</p>
                    <form action="comment.php" method="post">
                        <input type="hidden" name="post_id" value="">
                        <input type="text" name="comment" id="comment" class="comment-input" placeholder="Comente aqui.">
                        <button class="btn-comment">Enviar</button>
                    </form>
                </div>



                


            </div>
            <hr>
        </div>


        
 

    </div>
</body>
</html>