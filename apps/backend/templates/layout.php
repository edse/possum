<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width">

  <?php include_stylesheets() ?>
  <style>
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }
  </style>
  
  <?php include_javascripts() ?>
</head>
<body>
  <?php include_partial('global/menu') ?>
  <div class="container-fluid">
    <?php echo $sf_content ?>
    <?php include_partial('global/footer') ?>
  </div>
</body>
</html>