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
				<section id="idea">
					<div class="content">
						<header>
							<h2>Voici l'Ideabox</h2>
							<p>Ici, vous pouvez proposer des idée d'events. Vous pouvez également <br />indiquer celles qui vous intéressent afin qu'elles soient validées.</p>
						</header>
						<span class="image"><img src="https://www.bloomled.fr/img/cms/ampoule-spectre-bloomled.png" alt="" /></span>
					</div>
					<a href="#1" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->

			<a href="addidea.php" class="float"><i class="fa-plus fa my-float"></i></a>

			<?php 
			if (!empty($_COOKIE['pseudo']) AND !empty($_COOKIE['session_id'])){
				$req = $bdd->prepare("SELECT * FROM users WHERE session_id=:sessionID AND first_name=:pseudo");
				$req->execute(array(':sessionID' => $_COOKIE['session_id'], 
									':pseudo' => $_COOKIE['pseudo']));
				$user=$req->fetch();
			}

			$req = $bdd->prepare("SELECT * FROM evenement WHERE evenement=0");
			$req->execute();

			$pres="";
			$id=1;
			$idd=2;

			
			if(!empty($user)){
			while ($donnees = $req->fetch())
			{
				$r=$bdd->prepare('SELECT * FROM vote WHERE id_users=:userID AND id_evenement=:commentID');
				$r->execute(array(':commentID' => $donnees['id'], ':userID' => $user['id'] ));
				$like=$r->fetch();

				if ($id%2 == 0) {
					$pres = "3 right";
				} else{
					$pres = "2 left";
				}

				echo "<section id=\"". $id ."\" class=\"spotlight style". $pres ."\">
					<span class=\"image fit main\"><img src=\"". $donnees['picture'] ."\" alt=\"\" /></span>
					<div class=\"content\">
						<header>
							<h2>". $donnees['name'] ."</h2>
							<p>". $donnees['metting'] ."</p>
						</header>
						<p>". $donnees['description'] ."</p>
						<ul class=\"actions\">
							<a class='member' href='actions/addLike.php?comid=".$donnees['id']."'>";
							if(is_null($like['id_users'])){
										echo "<center><img style=\"width: 20%; height: 20%;\" id='love".$donnees['id']."' src='images/emptyheart.jpg'  alt='' onclick='myLove(".$donnees['id'].")'/></center>";
									}
									else{ 
										echo "<center><img style=\"width: 20%; height: 20%;\" id='love".$donnees['id']."' src='images/fullheart.jpg'  alt='' onclick='myLove(".$donnees['id'].")'/></center>";
									}
									
									echo "
									</a> 
						</ul>
					</div>
					<a href=\"#". $idd ."\" class=\"goto-next scrolly\">Next</a>
				</section>";

				$id=$id+1;
				$idd=$idd+1;
				
			}
		}else{
			echo 'Vous devez être connecté';
		} 

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
			<<script src="assets/js/love.js"></script>

	</body>
</html>
