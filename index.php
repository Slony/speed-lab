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

		<?php include('inc/video-yt.php');?>


	</div> <!--container -->


	<?php include('footer.php');?>
