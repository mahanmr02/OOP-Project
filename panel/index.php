<?php require_once '../functions/helpers.php';
require_once '../functions/check-login.php';
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

<?php require_once 'layouts/top-nav.php';  ?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">

            <?php require_once 'layouts/sidebar.php';  ?>

            </section>
            <section class="col-md-10 pb-3">

                <section style="min-height: 80vh;" class="d-flex justify-content-center align-items-center">
                    <section>
                        <h1>Click on Category or Post</h1>
                        <ul class="mt-2 li">

                    </section>
                </section>

            </section>
        </section>
    </section>


</section>

<script src=" <?php echo asset("assets/js/jquery.min.js") ?> "></script>
<script src="<?php echo asset("assets/js/bootstrap.min.js") ?>"></script>
</body>
</html>