<?php 
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once '../../functions/check-login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href=" <?php echo asset("assets/css/bootstrap.min.css")?> " media="all" type="text/css">
    <link rel="stylesheet" href="<?php echo asset("assets/css/style.css")?>" media="all" type="text/css">
</head>
<body>
<section id="app">

<?php 
require_once '../layouts/top-nav.php'
?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
            <?php 
require_once '../layouts/sidebar.php'
?>
            </section>
            <section class="col-md-10 pt-3">

                <section class="mb-2 d-flex justify-content-between align-items-center">
                    <h2 class="h4">Categories</h2>
                    <a href="<?php echo url('panel/category/create.php') ?>" class="btn btn-sm btn-success">Create</a>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            global $pdo;
                            $query = "SELECT * FROM categories";
                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $categories = $statement->fetchAll();
                            foreach ($categories as $category){
                    
                            ?>
                     
                            <tr>
                                <td><?php echo $category->id ?></td>
                                <td><?php echo $category->name ?></td>
                                <td>
                                    <a href="<?= url("panel/category/edit.php?cat_id=" . $category->id) ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?php echo url("panel/category/delete.php?cat_id=" . $category->id)?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>

                           <?php } ?>

                        </tbody>
                    </table>
                </section>


            </section>
        </section>
    </section>





</section>

<script src=" <?php echo asset("assets/js/jquery.min.js") ?> "></script>
<script src="<?php echo asset("assets/js/bootstrap.min.js") ?>"></script>
</body>
</html>