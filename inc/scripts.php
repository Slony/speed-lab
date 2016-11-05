

<?php if(JS == "min"): ?>
  <script type="text/javascript" src="<?= BASEURL;?>js/app.min.js"></script>
<?php else: ?>
  <script type="text/javascript" src="<?= BASEURL;?>js/app.js"></script>
<?php endif; ?>


<?php if(CSS == "inline"): ?>
  <script>loadCSS( "<?= BASEURL;?>css/app.css" );</script>
<?php endif;?>



<?php if (LAZYLOADING == "true") : ?>
  <script src="js/libs/lazyload.js"></script>
  <script>
  $(function() {
    $("img.lazy").lazyload();
  });
  </script>
<?php  endif; ?>
