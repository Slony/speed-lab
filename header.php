<?php require('inc/functions.php'); ?>
<?php (HTMLMIN == "true") ? ob_start("sanitize_output") : ""; ?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Test page</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php if(DNSPREFETCH !== "false"): ?>
    <link rel="dns-prefetch" href="//placehold.it">
  <?php endif;?>
  <!-- CSS -->
  <?php if(CSS !== "inline" && SPRITE =="true") : ?>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/sprite.css">
  <?php elseif(CSS !== "inline" && SPRITE =="false") : ?>
    <link rel="stylesheet" type="text/css" href="css/app.css">
  <?php else: ?>
    <?php include('inc/css-async.php'); ?>
  <?php endif; ?>

  <?php if (!$detect->isMobile()): ?>
    <link rel="stylesheet" type="text/css" href="css/libs/desktop/owl.css">
  <?php endif;?>


  <?php if (ASYNCFONT == "false"): ?>
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
  <?php endif; ?>


  <!-- SCRIPT HEADER -->
  <?php (SCRIPT !== "footer") ? include('inc/scripts.php') : ""; ?>

</head>
