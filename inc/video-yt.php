
<?php if(LAZYLOADING == "true"): ?>
  <div class="bg-video lazyload"  data-bgset="http://lorempicsum.com/simpsons/200/200/1 200w, http://lorempicsum.com/simpsons/300/300/1 300w, http://lorempicsum.com/simpsons/400/300/1 400w, http://lorempicsum.com/simpsons/768/400/1 700w" data-sizes="auto">
    <a id="banner-player" href="https://www.youtube.com/watch?v=oQU-B7Nu-OM">
      <img class="player-btn" src="img/home-banner-promo-player.png">
    </a>
  </div>

<?php else: ?>

  <div class="bg-video"  style="background-image:url(http://lorempicsum.com/simpsons/768/400/1);background-position: center center;
  ">
  <a id="banner-player" href="https://www.youtube.com/watch?v=T2R3ZYTA3aQ">

    <?php if(LAZYLOADING == "true"): ?>
      <img class="player-btn lazyload"  data-src="img/home-banner-promo-player.png">
    <?php else : ?>
      <img class="player-btn" src="img/home-banner-promo-player.png">
    <?php endif;?>

  </a>
</div>

<?php endif;?>
