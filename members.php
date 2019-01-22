<!DOCTYPE html>

<?php require 'db_connexion/pdo.php' ?>

<html>
	<head>
		<title>Administration des membres</title>
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
		$data = $bdd->query("SELECT id,name,first_name,mail,bde,pro FROM users");
		
		
	?>


				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">

							<h2>Administration des membres</h2>
								
						</header>
					</div>
                </section>
                
                <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
					<th scope="col">Mail</th>
					<th scope="col">Membre Bde</th>
					<th scope="col">Salarié Cesi</th>
					<th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
					<?php  
						foreach($data as $value) {
						
						?>
						<form action="actions/action_users_administration.php" method="post">

							<?php
								echo '<tr>
								<td scope="row">'. $value['id'].'</td>
								<td>'.$value['name'].'</td>
								<td>'.$value['first_name'].' </td>
								<td>'.$value['mail'].' </td>
								<td>'.$value['bde'].' </td>
								<td>'.$value['pro'].' </td>';

								if($value['pro'] == 0 )
								{
									echo '<td><button type="submit"  name="sub_button" value="'.$value['id'].'" class="button" style="background-color: #008416;" > Upgrade <i class="fa fa-check-circle"></i> </button></td>
									</tr>';
								}else
								{
									echo '<td><button type="submit" name="sub_button" value="'.$value['id'].'" class="button" style="background-color: #d80000;" > Downgrade <i class="fa fa-minus-circle"></i> </button></td>
									</tr>';
								}
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