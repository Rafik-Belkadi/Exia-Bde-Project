
<!DOCTYPE HTML>

<?php

require 'db_connexion/pdo.php'

?>


<html>
<?php session_start(); 
if(!isset($_GET['event'])){
	
	header('Location: eventlist.php');
}


if (!empty($_COOKIE['pseudo']) AND !empty($_COOKIE['session_id'])){
	$req = $bdd->prepare("SELECT * FROM users WHERE session_id=:sessionID AND first_name=:pseudo");
    $req->execute(array(':sessionID' => $_COOKIE['session_id'], 
                        ':pseudo' => $_COOKIE['pseudo']));
    $user=$req->fetch();


    $req = $bdd->prepare("SELECT * FROM evenement WHERE name=:event");
    $req->execute(array(':event' => $_GET['event']));
    $donnees = $req->fetch();

    $req = $bdd->prepare("SELECT * FROM signin WHERE id_evenement=:eventID AND id_users=:userID");
    $req->execute(array(':eventID' => $donnees['id'], ':userID' => $user['id']));
    $data =$req->fetch();

    if (is_null($data['id'])){
    	$isSuscribed=false;
    }
    else{
    	$isSuscribed=true;
    }
}
else{
	$isSuscribed=false;
}


	
?>

	<head>
		<title>Event</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/profilpic.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style>
		
		.btn {
			background-color: #f45042; /* Blue background */
			border: none; /* Remove borders */
			color: white; /* White text */
			padding: 12px 16px; /* Some padding */
			font-size: 16px; /* Set a font size */
			cursor: pointer; /* Mouse pointer on hover */
		}

/* Darker background on mouse-over */
		.btn:hover {
		background-color: #ffc74f;
		}
		.jaune {
			background-color: #efae23; /* Blue background */
			border: none; /* Remove borders */
			color: white; /* White text */
			padding: 12px 16px; /* Some padding */
			font-size: 16px; /* Set a font size */
			cursor: pointer; /* Mouse pointer on hover */
		}

/* Darker background on mouse-over */
		.jaune:hover {
		background-color: #f92313;
		}

		.bleu {
			background-color: #59aeff; /* Blue background */
			border: none; /* Remove borders */
			color: white; /* White text */
			padding: 12px 16px; /* Some padding */
			font-size: 16px; /* Set a font size */
			cursor: pointer; /* Mouse pointer on hover */
		}

/* Darker background on mouse-over */
		.bleu:hover {
		background-color: #3a9fff;
		}

		.row.uniform.mm {
			    margin-left: auto;
			    margin-right: auto;

		}
		</style>
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<?php include("includes/header.php"); ?>
			<!-- Header -->

			
			<?php

			$req = $bdd->prepare("SELECT * FROM evenement WHERE name=:event");
			$req->execute(array(':event' => $_GET['event']));

			$donnees = $req->fetch()
			?>

			<!-- Four -->

			
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2><?php echo $donnees['name'];?></h2>
							
						</header>

						<!-- Content -->
							<section id="content">
								<a href="#" class="image fit"><img src=<?php echo $donnees['picture'];?> alt="" /></a>
								<ul class="actions fit big">
									<li>
										<?php 
										
<<<<<<< HEAD
										
										if($_GET['isPasse'] == 1){
=======
										if($_GET['isPasse'] == 1){

>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
											echo "<a href='image.php?eventid=".$donnees["id"];
												echo $donnees['name'];
												echo "' class='button fit big'>";
												echo "Télécharger Images";
												echo "</a>";
<<<<<<< HEAD
										}else if(empty($_GET['isPasse'])){
=======

										}else{
>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
											if($isSuscribed){
												echo "<a href='actions/action_exitevent.php?event=";
												echo $donnees['name'];
												echo "' class='button fit big'>";
												echo "se désinscrire";
											}
											else{
												echo "<a href='actions/action_gotoevent.php?event=";
												echo $donnees['name'];
												echo "' class='button fit big'>";
												echo "S'inscrire";
											}
											echo "</a>";
										}
<<<<<<< HEAD
=======

										
>>>>>>> a9617404f70324002eac31c79807914fc2c3fa27
										?>
									</li>

								</ul>
								<center>
									<?php 
										if (!empty($_GET['error'])) {
											if($_GET["error"]==="notconnected"){
												echo "Please connect first !";
											}
											elseif ($_GET["error"]==="suscribed") {
												echo "Suscribed successfully";
											}
											elseif ($_GET["error"]==="removed") {
												echo "Unsuscribed oowwwwww T-T";
											}
										}
									 ?>
								</center>
								<h3>Description</h3>
								<p><?php echo $donnees['description'];?></p>
								
							</section>

					</div>
				</div>

			<header class="major">
				<h2>Comment Zone</h2>				
			</header>
			<!-- Comment Zone -->

			<div id="main" class="wrapper style1">
				<div class="container">
			<?php 
				$req = $bdd->prepare('SELECT * FROM commentaires where id_evenement=:eventID');
				$req->execute(array(':eventID' => $donnees['id']));
				
				
				
				
				while ($donnees = $req->fetch())
				{
					$requ = $bdd->prepare('SELECT first_name, profile_pic, id FROM users where id=:comUserID');
					$requ->execute(array(':comUserID' => $donnees['id_users']));
					$u=$requ->fetch();

					$r=$bdd->prepare('SELECT * FROM likes WHERE id_user=:userID AND id_commentaires=:commentID');
					$r->execute(array(':commentID' => $donnees['id'], ':userID' => $user['id'] ));
					$like=$r->fetch();
				
					if($donnees['undesirable'] != 1){
					echo "
					<div class='ninjaflex'>
						<div class='boxcomm'>
							<div class='ninjaflex2'>
								<div class='boximgpic'>
									<img src='".$u['profile_pic']."' class='profilpic' alt='' />
								</div>
								<div>
									<p style='text-align: justify;'><b>".$u['first_name']." : </b>".$donnees['comments']."</p>";
									if($user['bde'] == 1 ){
										echo '<a href="actions/action_supprimer_commentaire.php?id='.$donnees['id'].'"><button class="btn"><i class="fa fa-trash"></i></button></a>';
									}else if($user['pro'] == 1){
										echo '<a href="signaler_commentaire.php?id='.$donnees['id'].'"> <button class="jaune"><i class="fa fa-warning"></i></button></a><a href="'.$donnees['images'].'" download> <button class="bleu"><i class="fa fa-download"></i></button></a>';
									}
									echo "
								</div>
								<div class='boximgcomm'>
									<img src='".$donnees['images']."' class='imgcomm' alt='' />
								</div>
								<div>
									<a href='actions/action_lovecomment.php?event=".$_GET['event']."&comid=".$donnees['id']."'>";
									if(is_null($like['id_user'])){
										echo "<img id='love".$donnees['id']."' src='images/emptyheart.jpg' class='likes' alt='' onclick='myLove(".$donnees['id'].")'/>";
									}
									else{ 
										echo "<img id='love".$donnees['id']."' src='images/fullheart.jpg' class='likes' alt='' onclick='myLove(".$donnees['id'].")'/>";
									}
									
									echo "
									
									</a>
								</div>
							</div>
						</div> 
					</div>";
					}
				}

			?>

			<!-- Add comment -->


			<?php echo "<form method='post' action='actions/action_comment.php?event=".$_GET['event']."'>";  ?>
				<div class="row uniform mm 50%">
					<div class="10u 12u$(xsmall)">
						<input type="text" name="comment" id="comment" value="" placeholder="your comment here" />
					</div>
				</div>
				<div class="row uniform mm 50%">
					<div class="10u 12u$(xsmall)">
						<input type="text" name="image" id="image" value="" placeholder="your image link here" />
					</div>
				<ul class="actions">
					<li><input type="submit" value="Submit" class="special" /></li>
				</ul>
				</div>

				

			<center>
			<?php 
				if (!empty($_GET['error2'])) {
					if($_GET["error2"]==="notconnected"){
						echo "Please connect first !";
					}
					elseif ($_GET["error2"]==="commented") {
						echo "Comment added successfully";
					}
				}
			 ?>
			 </center>
			




				</div>
			</div>
			

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
			<script src="assets/js/love.js"></script>

	</body>
</html>
