<?php

require 'db_connexion/pdo.php'


?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Categories</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

		<style>
		
		.nigga {
			max-width: 256px; 
    		max-height: 170.656px;
		}
		</style>
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<?php include("includes/header.php"); ?>
			<!-- Header -->
				<?php 
					$lizom = $bdd->prepare("SELECT * FROM users WHERE `users`.`session_id` = :session_id AND `users`.`first_name` = :pseudo");
					$lizom->execute(array(':session_id' => $_COOKIE['session_id'], ':pseudo' => $_COOKIE['pseudo']));
					$data = $lizom->fetch(); 
				 ?>
			<!-- Banner -->
				<section id="categories">
					<div class="content">
						<header>
							<h2>Catégories de Produits</h2>
							<p>Ici, les produits sont classés par catégories, vous ne <br />
							verrez ainsi que le type de produit qui vous intéresse</p>
						</header>
						<span class="image"><img src="images/cat2.jpg" alt="" /></span>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

				<?php  if($data['bde'] == 1 ){ ?>
					<a href="ajouter_produit.php" class="float"><i class="fa-plus fa my-float"></i></a>
				<?php } ?>
			<!-- Populaire -->
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
						<h2>Populaire</h2>
						</header>
						<div class="box alt">
							<div class="row uniform">
							<?php

								$product_req = $bdd->prepare('SELECT * FROM products ORDER BY nbr_command');
								$product_req->execute();
								$count=0;
								while ($v = $product_req->fetch())
								{
									if($data['bde'] == 1){
										$count+=1;
										echo '<section class="4u 6u(medium) 12u$(xsmall)"><img class="nigga" src="'.$v['picture'].'"><h3>'. $v['name'] .' '.$v['price'].'$</h3><p>'. $v['description'] .'</p><ul class="actions small"><li><a href="actions/ajoutprodpanier.php?idprod=', $v['id'] ,'" class="button special small">Acheter</a></li><li><a href="actions/action_supprimer_produit.php?idprod=', $v['id'] ,'" class="button special small">Supprimer</a></li></ul></section>';
										if ($count>=3) {
											break;
										}
									}else {
										$count+=1;
										echo '<section class="4u 6u(medium) 12u$(xsmall)"><img class="nigga" src="'.$v['picture'].'"><h3>'. $v['name'] .' '.$v['price'].'$</h3><p>'. $v['description'] .'</p><ul class="actions small"><li><a href="actions/ajoutprodpanier.php?idprod=', $v['id'] ,'" class="button special small">Acheter</a></li></ul></section>';
										if ($count>=3) {
											break;
										}
									}
								}
							?>
							</div>
						</div> 
					</div>
				</section>


			
			<!-- Two -->
				<section id="two" class="spotlight style3 left">
					<span class="image fit main bottom"><img src="images/hardware.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Hardware</h2>
							<p>Améliorez votre setup aux couleurs de l'école</p>
						</header>
						<p>Besoins d'accessoires pour votre ordinateur ou vos appareil électronique ? Le BDE vend tout ce qu'il vous faut</p>
						<ul class="actions">
							<li><a href="products.php?cat=Hardware" class="button">Accès à la boutique</a></li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->

				<section id="three" class="spotlight style2 right">
					<span class="image fit main"><img src="images/vetement.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Vêtement</h2>
							<p>Pour supporter le BDE en mode full-corporate</p>
						</header>
						<p>Fière de votre école ? Arborez les couleurs de votre école partout où vous irez avec les vêtements BDE !</p>
						<ul class="actions">
							<li><a href="products.php?cat=Vetement" class="button">Accès à la boutique</a></li>
						</ul>
					</div>
					<a href="#four" class="goto-next scrolly">Next</a>
				</section>

			<!-- four -->

				<section id="four" class="spotlight style3 left">
					<span class="image fit main"><img src="images/bonbon.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Nourriture</h2>
							<p>Pour supporter le BDE en mode full-corporate</p>
						</header>
						<p>Si vous avez une petite faim... venez acheter nos produits.
						Pensez à installer Lydia vous aurez 1€ tout les 10€ d'achat !</p>
						<ul class="actions">
							<li><a href="products.php?cat=Nourriture" class="button">Accès à la boutique</a></li>
						</ul>						
					</div>
				</section>

			<!-- Footer -->
				
				<?php include("includes/footer.php"); ?>
			<!-- footer -->

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
