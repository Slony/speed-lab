
<?php if(LAZYLOADING == "true"): ?>
  <div class="bg-video lazyload"  data-bgset="http://lorempicsum.com/simpsons/200/200/1 200w, http://lorempicsum.com/simpsons/300/300/1 300w, http://lorempicsum.com/simpsons/400/300/1 400w, http://lorempicsum.com/simpsons/768/400/1 700w" data-sizes="auto">
    <a id="banner-player" href="https://www.youtube.com/watch?v=T2R3ZYTA3aQ">
      <img class="player-btn lazyload"  data-src="img/home-banner-promo-player.png">
    </a>
  </div>

<?php elseif(LAZYLOADING == "false" && IFRAME == "false" ): ?>

  <div class="bg-video"  style="background-image:url(http://lorempicsum.com/simpsons/768/400/1);background-position: center center;
  ">
  <a id="banner-player" href="https://www.youtube.com/watch?v=T2R3ZYTA3aQ">
    <img class="player-btn" src="img/home-banner-promo-player.png">
  </a>
</div>

<?php else: ?>

  <iframe class="iframe-video" src="https://www.youtube.com/embed/T2R3ZYTA3aQ" frameborder="0" allowfullscreen></iframe>

<?php endif;?>
