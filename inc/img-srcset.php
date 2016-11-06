<?php if(SRCSET == "true" && LAZYLOADING == "false"): ?>


  <img
  src="css/img/1200x800.jpeg"
  media="(min-width: 320px) 330w, (min-width: 400px) 400w, (min-width: 640px) 640w, (min-width: 1000px) 1000w"
  srcset="
  css/img/450x400.jpeg  300w,
  css/img/450x400.jpeg  400w,
  css/img/768x400.jpeg  640w,
  css/img/1200x800.jpeg 1000w"
  alt="" class="img-responsive img-center" />


<?php elseif (LAZYLOADING == "true" && SRCSET == "true"): ?>

  <img
  alt=""
  data-sizes="auto"
  data-srcset="
  css/img/450x400.jpeg 300w,
  css/img/450x400.jpeg 400w,
  css/img/768x400.jpeg 640w,
  css/img/1200x800.jpeg 1000w"
  data-src="css/img/1200x800.jpeg"
  class="lazyload img-responsive img-center" />

<?php elseif (LAZYLOADING == "true" && SRCSET == "false") : ?>

  <img class="lazyload img-responsive img-center" data-src="css/img/1200x800.jpeg" />

<?php else: ?>

  <img class="img-responsive img-center" src="css/img/1200x800.jpeg" />

<?php endif;?>
