<?php
require ('../includes/base.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php getBase() ?>

    <meta charset="utf-8">
    <title>404 | LibroDeAsistencia</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="attendance, employees, time tracker, time and attendance, time tracking app, Tracking software">
    <meta name="description" content="Reduce the risk of costly payroll errors while facilitating employee time tracking with automated GeoVictoria time and attendance software.">

    <!-- animate css -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>

    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

</head>
<body>

<!-- start preloader -->
<?php getPreloader() ?>
<!-- end preloader -->

<!-- start navigation -->
<?php getNavBar() ?>
<!-- end navigation -->

<!-- start 404 -->
<section id="c404" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 contenedor-c404">
                <h1>Sorry!</h1>
                <h3>The page you're looking for was not found</h3>
                <p>Error code: 404</p>

                <ul>
                    <li><a class="scrollTo" href="#home">Home</a></li>
                    <li><a class="scrollTo" href="#solution">Solution</a></li>
                    <li><a class="scrollTo" href="#work">How does it work</a></li>
                    <li><a class="scrollTo" href="#pricing">How does it cost</a></li>
                    <li><a class="scrollTo" href="#contact">Contact</a></li>
                    <li><a class="scrollTo" href="#freetrial" class="btn-freetrial">Try Free</a></li>
                </ul>
            </div>
            <div class="col-md-6 contenedor-c404">

                <img src="images/error-img.png">

            </div>
        </div>
    </div>
</section>
<!-- end login -->

<!-- start footer -->
<?php getFooter() ?>
<!-- end footer -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.singlePageNav.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery.validate.js"></script>

</body>

</html>