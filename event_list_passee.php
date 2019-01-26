<<<<<<< HEAD
e<?php
require 'db_connexion/pdo.php'
=======
<?php

require 'db_connexion/pdo.php'

>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Liste event</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
		<div id="page-wrapper">

		<!-- Header -->
				<?php include("includes/header.php"); ?>
			<!-- Header -->

			<!-- Banner -->
				<section id="event">
					<div class="content">
						<header>
							<h2>Voici la liste des events du BDE</h2>
							<p>Vous trouverez sur cette page la liste 
							des événements. <br />Vous pourrez 
							y participer, les commenter et bien plus encore.</p>
						</header>
						<span class="image"><img src="images/beer.jpg" alt="" /></span>
					</div>
					<a href="#1" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
			<?php 
<<<<<<< HEAD
			$req = $bdd->prepare("SELECT * FROM evenement WHERE evenement=1 AND   metting < DATE (NOW()) ");
			$req->execute();
			$pres="";
			$id=1;
			$idd=2;
			while ($donnees = $req->fetch())
			{
=======


			$req = $bdd->prepare("SELECT * FROM evenement WHERE evenement=1 AND   metting < DATE (NOW()) ");
			$req->execute();

			$pres="";
			$id=1;
			$idd=2;

			while ($donnees = $req->fetch())
			{

>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
				if ($id%2 == 0) {
					$pres = "3 right";
				} else{
					$pres = "2 left";
				}
<<<<<<< HEAD
=======

>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
				echo "<section id=\"". $id ."\" class=\"spotlight style". $pres ."\">
					<span class=\"image fit main\"><img src=\"". $donnees['picture'] ."\" alt=\"\" /></span>
					<div class=\"content\">
						<header>
							<h2>". $donnees['name'] ."</h2>
							<p>". $donnees['metting'] ."</p>
						</header>
						<p>". $donnees['description'] ."</p>
						<ul class=\"actions\">
							<li><a href=\"event.php?event=".$donnees['name']."&isPasse=1\" class=\"button\">Accès à l'event</a></li>
						</ul>
					</div>
					<a href=\"#". $idd ."\" class=\"goto-next scrolly\">Next</a>
				</section>";
<<<<<<< HEAD
=======

>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
				$id=$id+1;
				$idd=$idd+1;
				
			}
<<<<<<< HEAD
=======

>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
			$req->closeCursor();
			 ?>


			<!-- footer -->
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
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
