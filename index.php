<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php session_start() ?>

	<head>
		<title>BDE Exia Alger </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	</head>
	<body class="landing">

			<!-- Header -->
				<?php include("includes/header.php"); ?>
			<!-- Header -->
		<div id="page-wrapper">

			

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Bienvenue au bde des Exars d'Alger</h2>
							<p>Vous pourrez utiliser ce site pour acheter des goodies, voir la liste <br />
							des évênements, 
							y participer, les commenter et bien plus encore.</p>
						</header>
						<span class="image"><img src="images/LOGOBDEfinale.png" alt="" /></span>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="images/soire.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="4u 12u$(medium)">
									<header>
										<h2>Events BDE</h2>
										<p>Afin de faire vivre l'école, oubliez les cours le temps d'un soirée ou d'un aprèm</p>
									</header>
								</div>
								<div class="4u 12u$(medium)">
									<p>Soirée étudiante, concert, sport, tous les événements organisés par le BDE 
									sont accessibes pour tous les élèves. Oubliez vos projets, cours ou autres obligations
									scolaires le temps d'aller vous éclater. Partagez votre expérience de la soirée avec des photos 
									ou commentaires. Et si vous avez une bonne idée d'événement, la boîte à idée est là pour vous !</p>
								</div>
								<div class="4u$ 12u$(medium)">
									<div >
										<ul class="actions vertical">
											<li><a href="eventlist.php" class="button special fit">Accès aux events</a></li>
											<li><a href="ideabox.php" class="button fit">Accès à la boîte à idée</a></li>
											<li><a href="addidea.php" class="button special fit">Proposer un event</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="images/boutique.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Boutique</h2>
							<p>Pour supporter le BDE en mode full-corporate</p>
						</header>
						<p>Si vous avez une petite faim, une envie d'un pull, d'un T-shirt, besoin d'une clé usb, ... venez acheter nos produits.
						Supporter le BDE afin qu'il puisse organiser d'autres événemets de dingue, ou payer des binouzes. Commandez et les membres vous donnerons un rdv pour payer et retirer !</p>
						<ul class="actions">
							<li><a href="shop_cat.php" class="button">Accès à la boutique</a></li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->
				<section id="three" class="spotlight style3 left">
					<span class="image fit main bottom"><img src="images/association.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Associations</h2>
							<p>"Do whatever you want. If it doesn't exist, be the change you want to see" some random guy + Gandhi</p>
						</header>
						<p>Rejoignez ou créer une association. CE. QUE. VOUS. VOULEZ. Que ce soit du sport, du loisir, de l'apprentissage, ... peu importe. Le but est développer votre esprit associatif. Vous trouverez ci-dessous une petite liste exhaustive de quelques associations.</p>
					</div>
					<a href="#four" class="goto-next scrolly">Next</a>
				</section>

			
<!-- Four -->
                <section id="four" class="wrapper style1 special fade-up">
                    <div class="container">
                        <header class="major">
                            <h2>Voici quelques associations en exemple</h2>
                        </header>
                        <div class="box alt">
                            <div class="row uniform">
                                <section class="4u 6u(medium) 12u$(xsmall)">
                                    <span class="icon alt major fab fa-git-square "></span>
                                    <h3>CES'Education</h3>
                                    <p>Asso chargée d'organiser des séances culturelles concernant l'informatique (Langages de programmation, réseau).</p>
                                </section>
                                <section class="4u 6u$(medium) 12u$(xsmall)">
                                    <span class="icon alt major fa-comment"></span>
                                    <h3>JDR</h3>
                                    <p>Créez et participez à des séances de jeux de rôles ou à des jeux de sociétés (Les Loups garous, dominos, cartes etc...).</p>
                                </section>
                                <section class="4u$ 6u(medium) 12u$(xsmall)">
                                    <span class="icon alt major fas fa-external-link"></span>
                                    <h3>Cesi sorties</h3>
                                    <p>Asso chargée d'organiser tout types de sorties que ce soit culturelles que divertissantes (Cinéma, Zoo, Musée etc...).</p>
                                </section>
                                <section class="4u 6u$(medium) 12u$(xsmall)">
                                    <span class="icon alt major far fa-futbol"></span>
                                    <h3>Asso sport</h3>
                                    <p>Un peu de sport ? Rendez vous chaque jeudi pour un match de football ou pour un tournoi de ping-pong.</p>
                                </section>
                                <section class="4u 6u(medium) 12u$(xsmall)">
                                    <span class="icon alt major fas fa-trophy"></span>
                                    <h3>CESE'sport</h3>
                                    <p>Envie de participer à l'asso Esport spécial CESI ? L'asso Cese'sport est faite pour toi.</p>
                                </section>
                                <section class="4u$ 6u$(medium) 12u$(xsmall)">
                                    <span class="icon alt major fas fa-female"></span>
                                    <h3>Ces'Soirée</h3>
                                    <p>Asso organisatrice de soirée ou de bal dansant.</p>
                                </section>
                            </div>
                        </div> 
                    </div>
                </section>

			<!-- Footer -->
				<?php include("includes/footer.php"); ?>
			<!-- end footer -->
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