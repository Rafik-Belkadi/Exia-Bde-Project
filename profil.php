<!DOCTYPE html>

<?php require 'db_connexion/pdo.php' ?>

<html>
	<head>
		<title>Profil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

		<style>
		
		
			a.special{
				background-color: #e44c65;
				box-shadow: none;
				color: #ffffff !important;
				-moz-appearance: none;
				-webkit-appearance: none;
				-ms-appearance: none;
				appearance: none;
				-moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
				-webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
				-ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
				transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
				background-color: transparent;
				border-radius: 4px;
				border: 0;
				box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.3);
				color: #ffffff !important;
				cursor: pointer;
				display: inline-block;
				font-weight: 300;
				height: 3em;
				line-height: 3em;
				padding: 0 2.25em;
				text-align: center;
				text-decoration: none;
				white-space: nowrap;
			}

				a.special:hover{
					background-color: #e76278;
					box-shadow: inset 0 0 0 1px #e44c65;
					color:  #ffffff !important;
				}

		</style>
	</head>


<body>
<section>

	<!-- header -->

		<?php include("includes/header.php"); ?>
	<!-- end header -->
<?php 
		$req = $bdd->prepare("SELECT * FROM users WHERE `users`.`session_id` = :session_id AND `users`.`first_name` = :pseudo");
		$req->execute(array(':session_id' => $_COOKIE['session_id'], ':pseudo' => $_COOKIE['pseudo']));
		$data = $req->fetch(); 

		$requete = $bdd->prepare("SELECT count(*) as total from notifications where deprecated !=1");
		$requete->execute();
		$nombre_notifications = $requete->fetch(PDO::FETCH_OBJ);
		$nombre = $nombre_notifications->total;
	?>


				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<?php
								if($data['bde'] == 1){
									echo '<h2>My Admin profile</h2>';
								}else{
									echo '<h2>My profile</h2>';
								}
							?>
						</header>
					</div>
				</section>



	<center><img src=<?php echo $data['profile_pic'];?> alt="profile pic" style="height: 20%; width: 20%;" /></center>	
	<form method="post" action="actions/action_signup.php">
		<div class="row uniform 50%">
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="text" name="uname" id="uname" value="" placeholder=<?php echo $data['name'];?> />
			</div>
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="text" name="name" id="name" value="" placeholder=<?php echo $data['first_name'];?> />
			</div>
			<div class="4u"></div>
			<div class="4u$ 12u$(xsmall)">
				<input type="email" name="email" id="email" value="" placeholder=<?php echo $data['mail'];?> />
			</div>
			<div class="4u"></div>
			<div class="2u 12u$(xsmall)">
				<input type="password" name="password" placeholder="Password"/>
			</div>
			<div class="2u$ 12u$(xsmall)">
				<input type="password" name="confirm_password" placeholder="Password confirm"/>
			</div>
			<div class="4u"></div>
			<div class="4u$">
				<ul class="actions">
					<li><input type="submit" value="Submit" class="special" /></li>

				</ul>
			</div>
		</div>
	</form>

	

</section>
<?php
	if (!empty($_GET['error'])) {
		if($_GET["error"]==="emptyPost"){
			echo "Please fill all the form.";
		}
		elseif($_GET["error"]==="samePassword"){
			echo "Password not confirmed";
		}
		elseif (($_GET["error"]==="bddExist")) {
			echo "Username or email already exists";
		}
	}
?>

<?php
	if (!empty($_GET['error2'])) {
		if($_GET["error2"]==="emptyPost"){
			echo "Please fill all the form.";
		}
		elseif($_GET["error2"]==="WrongPassword"){
			echo "Username or password incorrect";
		}

	}
?>

<?php if($data['bde'] == 1) { ?>
<section>
	<div class="text-center" align="center">
		<header class="major">
			<h3> Panel d'administration</h3>
		</header>
		<ul class="actions">
			<li><a href="members.php" class="special">Accéder au membres</a></li>
			<li><a href="ideaValidation.php" class="special">Boite à Idées</a></li>
			<li><a href="event_admin.php" class="special">Accéder au Events</a></li>
			<li><a href="Notifications_admin.php" class="special">Accéder au Notifications (<?php echo $nombre ?>)</a></li>
			
		</ul>
	</div>


	<table></table>
	
	



</section>


<?php } ?>

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