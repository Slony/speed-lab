
<footer>

  <div class="social-group">

    <?php if(SPRITE !== "false"): ?>
      <a href="#"><i class="icon-github"></i></a>
      <a href="#"><i class="icon-fork"></i></a>
      <a href="#"><i class="icon-plus"></i></a>
      <a href="#"><i class="icon-twitter"></i></a>
      <a href="#"><i class="icon-equals"></i></a>
    <?php else: ?>
      <a href="#"><img src="img/sprites/raw/github.png"></i></a>
      <a href="#"><img src="img/sprites/raw/fork.png"></a>
      <a href="#"><img src="img/sprites/raw/plus.png"></i></a>
      <a href="#"><img src="img/sprites/raw/twitter.png"></a>
      <a href="#"><img src="img/sprites/raw/equals.png"></a>
    <?php endif;?>
  </div>


</footer>



<!-- SCRIPT FOOTER -->
<?php (SCRIPT == "footer") ? include('inc/scripts.php') : ""; ?>


<!-- CSS async -->
<?php if(CSS == "inline"): ?>
  <script>loadCSS( "<?= BASEURL;?>css/app.css" );</script>
<?php endif;?>

<?php if(SPRITE == "true"): ?>
  <script>loadCSS( "<?= BASEURL;?>css/sprite.css" );</script>
<?php endif;?>




</body>
</html>
