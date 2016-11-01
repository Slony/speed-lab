<?php if(SRCSET): ?>

  <img
  src="http://placehold.it/1200x800"
  sizes="100vw"
  srcset="
  http://placehold.it/320x140 330w,
  http://placehold.it/400x200 400w,
  http://placehold.it/640x300 640w,
  http://placehold.it/1000x400  1000w"
  alt="" class="img-responsive" />

<?php else: ?>

  <?php $randNum = rand(1,5);?>
  <img src="http://placehold.it/1200x800" alt="spaceship" class="img-responsive img-center" >

<?php endif; ?>
