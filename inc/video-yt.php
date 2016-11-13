<?php if(LAZYLOADING == "true" && NOIFRAME == "false"): ?>
  <div class="bg-video lazyload"  data-bgset="img/home/video-bg/200x200-1.jpeg 200w, img/home/video-bg/300x300-1.jpeg 300w, img/home/video-bg/400x300-1.jpeg 400w, img/home/video-bg/768x400-1.jpeg 700w" data-sizes="auto">
    <a id="banner-player" href="https://www.youtube.com/watch?v=I4vX-twze9I">
      <img class="player-btn lazyload"  data-src="img/home-banner-promo-player.png">
    </a>
  </div>

<?php elseif(LAZYLOADING == "false" && NOIFRAME == "false" ): ?>

  <div class="bg-video"  style="background-image:url(img/home/video-bg/768x400-1.jpeg);background-position: center center;
  ">
  <a id="banner-player" href="https://www.youtube.com/watch?v=I4vX-twze9I">
    <img class="player-btn" src="img/home-banner-promo-player.png">
  </a>
</div>

<?php else: ?>

  <iframe class="iframe-video" src="https://www.youtube.com/embed/I4vX-twze9I" frameborder="0" allowfullscreen></iframe>

<?php endif;?>
