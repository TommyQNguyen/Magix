<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Magix</title>
        <link rel="stylesheet" rel="stylesheet" href="../css/global.css">
        <!-- <script src="js/sprites/Mole.js"></script> -->
        <!-- <script src="js/sprites/Tractor.js"></script> -->
        <!-- <script src="js/javascript.js"></script> -->
    </head>
    <body>

    <div class="menu">
		<ul>
			<li><a href="index.php">Accueil du site</a></li>
			<li><a href="login.php">Se connecter</a></li>
			<?php
				if ($data["isLoggedIn"]) {
					?>
					<li><a href="home.php">Mon accueil perso</a></li>
					<li><a href="profile.php">Mon profil</a></li>
					<li><a href="?logout=true">Déconnexion</a></li>
					<?php
				}
			?>
		</ul>
	</div>

        <div class="container">