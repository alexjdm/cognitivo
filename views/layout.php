<!DOCTYPE html>

<html>

    <head>
        <!--<base href="http://www.cognitivo.cl/">-->
        <base href="http://localhost/cognitivo/">

        <?php //require('tag-manager-head.php');?>

        <title><?php echo $this->pageTitle ?></title>
        <meta name="description" content="<?php echo $this->pageDescription ?>">
        <meta name="keywords" content="<?php echo $this->pageKeywords ?>">

        <?php require('metas-head.php');?>
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">
        <?php //require( 'tag-manager-body.php' );?>

        <!-- start navigation -->
        <?php require($this->navbar);?>
        <!-- end navigation -->

        <?php require($this->page); ?>

        <!-- start footer -->
        <?php require('footer.php'); ?>
        <!-- end footer -->

        <?php require('common-scripts.php'); ?>

    </body>

</html>