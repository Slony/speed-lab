<?php if(SRCSET !== "false"): ?>

  <?php $randNum = rand(1,8);?>
  <img
  src="http://placehold.it/1200x80<?= $randNum; ?>"
  media="(min-width: 320px) 330w, (min-width: 400px) 400w, (min-width: 640px) 640w, (min-width: 1000px) 1000w"
  srcset="
  http://placehold.it/320x14<?= $randNum; ?> 330w,
  http://placehold.it/400x20<?= $randNum; ?> 400w,
  http://placehold.it/640x30<?= $randNum; ?> 640w,
  http://placehold.it/1000x40<?= $randNum; ?> 1000w"
  alt="" class="img-responsive img-center" />



<?php else : ?>

  <?php if (LAZYLOADING == "true"): ?>
    <img class="lazy img-responsive img-center" data-original="http://placehold.it/1200x800" >
  <?php else : ?>
    <img src="http://placehold.it/1200x800" alt="spaceship" class="img-responsive img-center" >
  <?php endif;?>

<?php endif; ?>
