<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <base href="http://localhost/cognitivo/" />
    <!--<base href="http://www.cognitivo.cl/" />-->

    <title><?php echo $this->pageTitle ?></title>

    <?php require('metas-head.php');?>

</head>
<body class="hold-transition login-page">

    <?php require($this->page); ?>

    <?php require('common-scripts.php'); ?>
</body>
</html>
