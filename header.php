<?php require('inc/functions.php'); ?>
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
  <?php if(CSS !== "inline") : ?>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/sprite.css">
  <?php else : ?>
    <?php include('inc/css-async.php'); ?>
  <?php endif; ?>


  <!-- SCRIPT HEADER -->
  <?php (SCRIPT !== "footer") ? include('inc/scripts.php') : ""; ?>

</head>
