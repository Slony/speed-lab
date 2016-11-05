<?php include('header.php');?>


<body>



	<header class="banner-full-screen">
		<h1>Speed Lab</h1>
		<p class="subtitle">Web developement good pratices </p>
		<a href="#" id="btn-header" class="btn"> click me </a>
	</header>


	<div class="container">

		<?php include('inc/optistate.php');?>

		<?php for($i = 0 ; $i < 10; $i++): ?>
			<?= ($i == 1 || $i == 5) ? " <h2> Lorem ipsum dolor sit </h2>" : ""; ?>
			<?php include('inc/img-srcset.php'); ?>
			<p>Lorem ipsum dolor sit met, qui at desert mandamus, adduce ullum apeirian mea at. Eu mel vide saltando vituperata, sonet quidam deterruisset te qui. Te cum vivendum explicate abhorrent. Id venom argumentum vel. Ut lorem bocent hendrerit eam.Lorem ipsum dolor sit met, qui at desert mandamus, adduce ullum apeirian mea at. Eu mel vide saltando vituperata, sonet quidam deterruisset te qui. Te cum vivendum explicate abhorrent. Id venom argumentum vel. Ut lorem bocent hendrerit eam.Lorem ipsum dolor sit met, qui at desert mandamus, adduce ullum apeirian mea at. Eu mel vide saltando vituperata, sonet quidam deterruisset te qui. Te cum vivendum explicate abhorrent. Id venom argumentum vel. Ut lorem bocent hendrerit eam.</p>
		<?php endfor; ?>




	</div> <!--container -->

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




</body>
</html>
