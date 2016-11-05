<?php if(JS == "min"): ?>


  <script type="text/javascript" src="<?= BASEURL;?>js/app.min.js"></script>

<?php else: ?>

  <script type="text/javascript" src="<?= BASEURL;?>js/app.js"></script>


<?php endif; ?>


<script>loadCSS( "<?= BASEURL;?>css/app.css" );</script>
