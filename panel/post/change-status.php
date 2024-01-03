<?php
    require_once '../../functions/helpers.php';
    require_once '../../functions/pdo_connection.php';
    require_once '../../functions/check-login.php';
    

        global $pdo;
        //check for exists post id
        $query = 'SELECT * FROM php_project.posts WHERE id = ?';
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['post_id']]);
        $post = $statement->fetch();
        if($post !== false)
        {
          $status =  ($post->status == 10) ? 0 :10;


          $query = 'UPDATE posts SET status = ? WHERE id =?;';
          $statement = $pdo->prepare($query);
          $statement->execute([$status ,$_GET['post_id'] ]);

        }
        redirect('panel/post');





