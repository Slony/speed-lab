<?php if(JS == "min"): ?>
  <script type="text/javascript" src="<?= BASEURL;?>js/app.min.js"></script>

  <script>
  if (document.documentElement.clientWidth > 768) {
    document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"><\/script>');
    console.log("I'm > 640px so I loaded jQuery");
  }else{
    console.log("I don't laod this scripts on mobile");
  }
  </script>

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
