<?php

require 'db_connexion/pdo.php'

?>

<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<html>
	<head>
	<title>Produit</title>
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
	
	<?php
	
	if (empty($_GET['cat'])){
		header('Location: index.php');
	}

		$sahbi = $bdd->prepare("SELECT * FROM users WHERE `users`.`session_id` = :session_id AND `users`.`first_name` = :pseudo");
		$sahbi->execute(array(':session_id' => $_COOKIE['session_id'], ':pseudo' => $_COOKIE['pseudo']));
		$data = $sahbi->fetch(); 

		
		

	?>

	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<?php include("includes/header.php"); ?>
			<!-- Header -->
			
			<!-- Four -->
			<?php  if($data['bde'] == 1 ){ ?>
					<a href="ajouter_produit.php" class="float"><i class="fa-plus fa my-float"></i></a>
				<?php } ?>
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
						<h2><?php echo $_GET['cat'] ?></h2>
						</header>
						<div class="box alt">
							<div class="row uniform">
								<?php

								$wtf = $_GET['cat'];
								$product_req = $bdd->prepare('SELECT * FROM products WHERE categorie="'.$wtf.'" ');
								$product_req->execute();
								while ($v = $product_req->fetch())
								{
									if($data['bde'] == 1){
									echo '<section class="4u 6u(medium) 12u$(xsmall)"></i><img class="nigga" src="'.$v['picture'].'"><h3>'. $v['name'] .' '.$v['price'].'$</h3><p>'. $v['description'] .'</p><ul class="actions small"><li><a href="actions/ajoutprodpanier.php?idprod=', $v['id'] ,'" class="button special small">Acheter</a></li>
									<li><a href="actions/action_supprimer_produit.php?idprod=', $v['id'] ,'" class="button special small">Supprimer</a></li>
									</ul></section>';
									}else {
										echo '<section class="4u 6u(medium) 12u$(xsmall)"></i><img class ="nigga" src="'.$v['picture'].'"><h3>'. $v['name'] .' '.$v['price'].'$</h3><p>'. $v['description'] .'</p><ul class="actions small"><li><a href="actions/ajoutprodpanier.php?idprod=', $v['id'] ,'" class="button special small">Acheter</a>
										</ul></section>';
									}
								}
								?>
							</div>
						</div> 
					</div>
				</section>

			<!-- Footer -->
				<?php include("includes/footer.php"); ?>
			<!-- Footer -->

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