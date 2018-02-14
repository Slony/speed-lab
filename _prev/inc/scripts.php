<?php if(JS == "min"): ?>
  <script type="text/javascript" src="<?= BASEURL;?>js/app.min.js"></script>
<?php else: ?>
  <script type="text/javascript" src="<?= BASEURL;?>js/app.js"></script>
<?php endif; ?>

<?php if(CSS == "inline"): ?>
  <script>loadCSS( "<?= BASEURL;?>css/app.css" );</script>
<?php endif;?>


<?php if (LAZYLOADING == "true") : ?>
  <script src="js/libs/ls.bgset.min.js"></script>
  <script src="js/libs/lazysizes.js"></script>
<?php  endif; ?>


<?php
if (!$detect->isMobile()): ?>
<script type="text/javascript" src="<?= BASEURL;?>js/app-desktop.js"></script>
<?php endif;?>


<?php if (ASYNCFONT == "true") : ?>
  <script>
  WebFont.load({
    google: {
      families: ['Open Sans']
    }
  });
  </script>
<?php endif; ?>
