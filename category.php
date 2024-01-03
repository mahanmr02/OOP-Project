<?php 
require_once 'functions/pdo_connection.php';
require_once 'functions/helpers.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP</title>
    <link rel="stylesheet" href=" <?php echo asset("assets/css/bootstrap.min.css")?> " media="all" type="text/css">
    <link rel="stylesheet" href="<?php echo asset("assets/css/style.css")?>" media="all" type="text/css">
</head>
<body>
<section id="app">
<?php require_once "layouts/top-nav.php"?>
    <section class="container my-5">
   <?php

   $notFound = false ;
   if(isset($_GET['cat_id']) AND $_GET['cat_id'] !== ''){
   global $pdo;
   $query = 'SELECT * FROM `categories` WHERE id = ?';
$statement = $pdo->prepare($query);
$statement -> execute([$_GET['cat_id']]);
$category = $statement->fetch();
if($category !== false){
    ?>
            <section class="row">


                <section class="col-12">
                    <h1><?= $category->name ?></h1>
                    <hr>
                </section>
            </section>
            
            <section class="row">
               <?php 
               $query = 'SELECT * FROM posts WHERE status=10 AND cat_id = ? ;';
               $statement = $pdo-> prepare($query);
               $statement ->execute([$_GET['cat_id']]);
               $posts = $statement->fetchAll();

               foreach($posts as $post){
               
               ?>
                    <section class="col-md-4">
                        <section class="mb-2 overflow-hidden" style="max-height: 15rem;"><img class="img-fluid" src="<?= asset($post->image) ?>" alt="" width="200" height= "100"></section>
                        <h2 class="h5 text-truncate"><?= $post->title ?></h2>
                        <p><?= substr($post->body , 0,40) . '...' ?></p>
                        <p><a class="btn btn-primary" href="<?= url('detail.php?post_id=' . $post->id) ?>" role="button">View details »</a></p>
                    </section>
                  <?php } }
                  else{
                    $notFound = true;
                  }
                  
               }
                  else{

                    $notFound = true;
                  }
                  ?>
            </section>
          <?php if($notFound == true){?>
            <section class="row">
                <section class="col-12">
                    <h1>Category not found!</h1>
                </section>
            </section>
       <?php }  ?>
        </section>
    </section>

</section>
<script src=" <?php echo asset("assets/js/jquery.min.js") ?> "></script>
<script src="<?php echo asset("assets/js/bootstrap.min.js") ?>"></script> 
</body>
</html>