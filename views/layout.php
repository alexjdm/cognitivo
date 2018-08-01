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

        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId            : '238989583373986',
                    autoLogAppEvents : true,
                    xfbml            : true,
                    version          : 'v3.0'
                });
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/es_ES/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

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