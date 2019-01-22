<!DOCTYPE html>

<html>
	<head>
		<title>Ajout produit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>


<body>

<section>

		<!-- Header -->
				<?php include("includes/header.php"); ?>
		<!-- Header -->


				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
						<h2>Ajouter un Produit</h2>
						</header>
					</div>
				</section>

	<center><h3>Ajouter un Produit</h3></center>
	<form method="post" action="actions/action_ajouter_produit.php">
		<div class="row uniform 50%">
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="text" name="nom" id="nom" value="" placeholder="Nom" />
			</div>
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="checkbox"   name="categorie"  value="Hardware" > Hardware
				<input type="checkbox"   name="categorie"  value="Nouriture"> Nouriture
				<input type="checkbox"   name="categorie"  value="Vetement"> Vetement
			</div>
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="text" name="price" id="price" value="" placeholder="Prix" />
			</div>
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="text" name="description" id="description" value="" placeholder="Description" />
			</div>
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="text" name="picture" placeholder="Picture (lien internet)"/>
			</div>
			<div class="4u"></div>
				<ul class="actions">
					<li><input type="submit" value="Submit" class="special"/></li>
				</ul>
		</div>
	</form>
	<?php
	if (!empty($_GET['error'])) {
		if($_GET["error"]==="emptyPost"){
			echo "Please fill all the form.";
		}
		elseif (($_GET["error"]==="bddExist")) {
			echo "Product already exists";
		}
	}
?>

</section>


			<!-- footer -->
				<?php include("includes/footer.php"); ?>
			<!-- footer -->

		</div>

<!-- Scripts -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>	
			<script>

	$('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script>
</body>