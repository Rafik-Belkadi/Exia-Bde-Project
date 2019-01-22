
<!DOCTYPE html>
<?php require '../db_connexion/pdo.php'; ?>

<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		
	</head>

<body>
<section>

	<!-- header -->

		<?php include("../includes/header.php"); ?>




<?php

$id_du_mec = $_POST['sub_button'];


    $req = $bdd->prepare("SELECT * FROM evenement WHERE id=".$id_du_mec."");
    $req->execute();
    $data = $req->fetch(PDO::FETCH_OBJ);

    ?>
    

    <section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">

                            <h2>Changer les détails de l'évenement</h2>
                            
								
						</header>
					</div>
                </section>
                
    <form method="POST" action="action_add_event_post.php">
		<div class="row uniform 50%">
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="text" name="date"   placeholder=<?php echo $data->metting;?> />
			</div>
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="text" name="description"   placeholder="<?php echo $data->description ;?>" />
			</div>
			<div class="4u"></div>
			<div class="4u$">
				<button type="submit"  name="id_mec" value="<?php echo $data->id ?>" class="button" style="background-color: #008416; color: white;" > Confirmer <i class="fa fa-check-circle"></i> </button>
			</div>
		</div>
    </form>
    


    </section>




			<!-- Footer -->
				<?php include("../includes/footer.php"); ?>
			<!-- Footer -->

		</div>
		
<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>	
</body>