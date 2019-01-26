<header id="header">
					<h1 id="logo"><a href="index.php">BDE Exia Alger</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Acceuil</a></li>
							<li>
								<a href="eventlist.php">Evenements</a>
								<ul>
									<li>
									<a href="eventlist.php">Liste Events</a>
									
									<ul>
											<li><a href="event_list_passee.php">Events Passé</a></li>
											<li><a href="event_list_future.php">Events Future</a></li>
										</ul>
									<li>
										<a href="ideabox.php">Boîte à idée</a>
										<ul>
											<li><a href="ideabox.php">Liste des idées</a></li>
											<li><a href="addidea.php">Proposer un event</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<a href="shop_cat.php">Boutique</a>
								<ul>
									<li><a href="shop_cat.php">Catégorie</a>
										<ul>
											<li><a href="products.php?cat=Nourriture">Nourriture</a></li>
											<li><a href="products.php?cat=Hardware">Hardware</a></li>
											<li><a href="products.php?cat=Vetement">Vêtement</a></li>
										</ul>
									</li>
									<li><a href="panier.php">Panier</a></li>
								</ul></li>
							

							<?php 
								if(isset($_COOKIE['pseudo']))
								{
									echo '<li><a href="profil.php" class="button special">Bienvenu '.$_COOKIE['pseudo'].'</a>';
									
									echo "<ul>",
										"<li><a href='profil.php'>Mon Profil</a></li>",
										"<li><a href='logout.php'>Deconnexion</a></li>",
									"</ul>";
									
									echo '</li>';
									
									
								}else
								{
									echo '<li><a href="login.php" class="button special">Connexion / Inscription</a></li>';
								}
							?>

							</li>
						</ul>
					</nav> 
				</header>
