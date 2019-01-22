<!DOCTYPE html>

<?php require 'db_connexion/pdo.php' ?>

<html>
	<head>
		<title> Notifications </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		
	</head>


<body>
<section>

	<!-- header -->

		<?php include("includes/header.php"); ?>
	<!-- end header -->
<?php 
		$data = $bdd->query("SELECT * FROM notifications where deprecated !=1");
		
		
	?>


				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">

							<h2>Notifications des signalements</h2>
								
						</header>
					</div>
                </section>
                
                <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Raison Signalement</th>
					<th scope="col">Rétablissement</th>
                    <th scope="col">Suppression</th>

                    </tr>
                </thead>
                <tbody>
					<?php  
						foreach($data as $value) {
						
						?>
						<form action="actions/action_admin_notifications.php" method="post">

							<?php
								echo '<tr>
								<td scope="row">'. $value['id'].'</td>
								<td>'.$value['contenu'].'</td>
								<td>'.$value['raison'].' </td>
                                <td><button type="submit"  name="retablir_butt" value="'.$value['comment_id'].'" class="button" style="background-color: #008416;" > Rétablir <i class="fa fa-arrow-right"></i> </button></td>
								<td><button type="submit"  name="supp_button" value="'.$value['comment_id'].'" class="button" style="background-color: #e21402;" > Supprimer <i class="fa fa-arrow-right"></i> </button>
								<input type="hidden" id="custId" name="notif" value="'.$value['id'].'">
								</td>
									</tr>';
							
							?>
						</form>
					
					<?php } ?>
                </tbody>
                </table>



	
	



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