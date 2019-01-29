<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>


<body>
<section>

		<!-- header-->

			<?php include("includes/header.php") ?>

		<!-- header end-->


	<section id="four" class="wrapper style1 special fade-up">
		<div class="container">
			<header class="major">
			<h2>Connexion / Inscription</h2>
			</header>
		</div>
	</section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6" style="width: 50%;">
				<center><h3>SIGNUP</h3></center>	
					<form method="post" action="actions/action_signup.php">
						<div class="row uniform ">
							<div class="4u"></div>
							<div class="">
								<input type="text" name="uname" id="uname" value="" placeholder="UserName" />
							</div>
							<div class="4u"></div>
							<div class="">
								<input type="text" name="name" id="name" value="" placeholder="Name" />
							</div>
							<div class="4u"></div>
							<div class="">
								<input type="email" name="email" id="email" value="" placeholder="Email" />
							</div>
							<div class="4u"></div>
							<div class="">
								<input type="text" name="localisation" id="localisation" value="" placeholder="Centre Cesi Exia" />
							</div>
							<div class="4u"></div>
							<div class="">
								<input type="password" name="password" placeholder="Password"/>
							</div>
							<div class="4u"></div>
							<div class="">
								<input type="password" name="confirm_password" placeholder="Confirm Password"/>
								

							</div>
							<div class="4u"></div>
							<div class="4u$">
							
								<input required style="margin-left:10px" type="checkbox" name="Mention" value="ok"> Acceptez condition du réglement <br>
										<a href="Mention_legale.html">Mention Légales</a>
										</div>
					
							<div class="4u"></div>
							<div class="4u$">
								<ul class="actions">
							
					<li><input type="submit" value="Submit" class="special" /></li>

									

								</ul>
							</div>
						</div>
					</form>
						
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
							elseif (($_GET["error"]=== "passwordLength")) {
								echo "Your password must Contain at least 8 digits";
							}
							elseif (($_GET["error"]=== "passwordNoNumber")) {
								echo "Your password must contain at least one number";
							}
							elseif (($_GET["error"]=== "passwordCapitalLetter")) {
								echo "Your password must at least contain one Capital letter";
							}
							elseif (($_GET["error"]=== "passwordLowerCase")) {
								echo "Your password must at least contain one lowercase letter";
							}
							
						}
					?>
			</div>
						
			<div class="col-sm-6" style="width: 50%;">
			
				<center><h3>LOGIN</h3></center>
				<form method="post" action="actions/action_login.php">
					<div class="row uniform ">
						<div class="4u"></div>
						<div class="">
							<input type="text" name="uname" id="uname" value="" placeholder="UserName" />
						</div>
						
						<div class="4u"></div>
						<div class="">
							<input type="password" name="password" placeholder="password"/>
						</div>
						<div class="4u"></div>
						<div class="4u$">
							<ul class="actions">
								<li><input type="submit" value="Submit" class="special" /></li>
							<?php
						if (!empty($_GET['error2'])) {
							if($_GET["error2"]==="emptyPost"){
								echo "Please fill all the form.";
							}
							elseif($_GET["error2"]==="WrongPassword"){
								echo '<div class="alert alert-danger">Username or password incorrect</div>';
							}

						}
					?>
							</ul>
						</div>
					</div>
				</form>
					
					
			</div>
		</div>
	</div>






			<!-- Footer -->
				
				<?php include("includes/footer.php"); ?>
			<!-- End footer -->

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
