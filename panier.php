<?php 
	require 'db_connexion/pdo.php';  
	$req = $bdd->prepare("SELECT * FROM users WHERE session_id=:session");
	$req->execute(array('session' => $_COOKIE['session_id']));
	$iduser = $req->fetch();
	$iduser = $iduser['id'];
?>

<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<html>

<head>
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

				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
						<h2>Panier</h2>
						</header>
					</div>
				</section>

					<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th>Produit</th>
									<th>Description</th>
									<th>Quantité</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$req = $bdd->prepare("SELECT * FROM basket WHERE id_users=:id_users");
									$req->execute(array('id_users' => $iduser));
									$total=0;
									while ($data = $req->fetch()) {
										$rek = $bdd->prepare("SELECT * FROM products WHERE id=:idprod");
										$rek->execute(array('idprod' => $data['id_products']));
										$prod = $rek->fetch();
										echo '<tr>
											<td>'. $prod['name'] .'</td>
											<td>'. $prod['description'] .'</td>
											<td>'. $data['tot'] .'</td>
											<td>'. $prod['price'] .'</td>
										</tr>';
										$total = $total + $prod['price'] * $data['tot'];
										
										$zee[] = $prod['name'];
										
									}
									$prouctsNames = implode(", ", $zee);
									$url = 'actions/action_vamider_commande.php?products='.$prouctsNames.'&total='.$total.'&id_user='.$iduser;
								?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"></td>
									<td><?php echo $total;?></td>
								</tr>
							</tfoot>
						</table>
						

						<div class="row uniform 50%">
							<div class="8u"></div>
							<div class="4u$ 12u$(xsmall)">
								<ul class="actions">
									<li><a href="<?php echo 'actions/action_valider_commande.php?products='.$prouctsNames.'&total='.$total.'&id_user='.$iduser ?>" class="button special">Commander</a></li>
									
								</ul>
								<br>
							</div>
						</div>
					</div>
					<?php	if (!empty($_GET['error'])) {
								if($_GET["error"]==="EmptyPanier"){
									echo "Le panier est vide ! Allez le remplir à la Boutique ! :)";
								}	
							}
							
					?>
					<!-- footer -->
				<?php include("includes/footer.php"); ?>
			<!-- footer -->
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