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
        <!-- Example row of columns -->
        <section class="row">
           <?php 
            global $pdo;
            $query = "SELECT * FROM posts WHERE status = 10;";
            $statement = $pdo->prepare($query);
            $statement->execute();
            $posts = $statement->fetchAll();
            foreach ($posts as $post){
           ?>
                <section class="col-md-4">
                    <section class="mb-2 overflow-hidden" style="max-height: 15rem;">
                    <img class="img-fluid" src="<?= asset($post->image); ?>" alt=""></section>
                    <h2 class="h5 text-truncate"><?= $post->title ?>/h2>
                    <p><?= substr($post->body , 0 , 20) ?>...</p>
                    <p><a class="btn btn-primary" href="<?= url('detail.php?post_id= ' . $post->id )?>" role="button">View details »</a></p>
                </section>
                <?php } ?>
               
        </section>
    </section>

</section>
<script src=" <?php echo asset("assets/js/jquery.min.js") ?> "></script>
<script src="<?php echo asset("assets/js/bootstrap.min.js") ?>"></script> 
</body>
</html>