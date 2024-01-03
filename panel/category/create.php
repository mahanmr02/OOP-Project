<?php 
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once '../../functions/check-login.php';


if(isset($_POST['name']) AND $_POST['name'] !== ''){


global $pdo;
$query = "INSERT INTO categories SET name = ? , created_at = NOW() ;";
$statement = $pdo->prepare($query);
$statement -> execute([$_POST['name']]);
redirect('panel/category');



}




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

                    <form action="create.php" method="post">
                        <section class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name ...">
                        </section>
                        <section class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </section>

                    </form>

                </section>
            </section>
        </section>

    </section>

    <script src=" <?php echo asset("assets/js/jquery.min.js") ?> "></script>
<script src="<?php echo asset("assets/js/bootstrap.min.js") ?>"></script>
</body>

</html>