<?php if(SRCSET): ?>

  <?php $randNum = rand(1,5);?>
  <img
  src="http://lorempicsum.com/futurama/1200/800/<?= $randNum;?>"
  alt="spaceship" class="img-responsive img-center"
  srcset="
  http://lorempicsum.com/futurama/300/200/<?= $randNum;?> 400w,
  http://lorempicsum.com/futurama/600/400/<?= $randNum;?> 768w,
  http://lorempicsum.com/futurama/1224/800/<?= $randNum;?> 1024w
  " >

<?php else: ?>

  <?php $randNum = rand(1,5);?>
  <img src="http://lorempicsum.com/futurama/1200/800/<?= $randNum;?>" alt="spaceship" class="img-responsive img-center" >

<?php endif; ?>
