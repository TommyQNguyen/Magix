<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Magix</title>
        <!-- <link rel="stylesheet" rel="stylesheet" href="css/global.css"> -->
		<!-- <link rel="stylesheet" rel="stylesheet" href="css/game.css"> -->
		<link rel="stylesheet" href="css/game.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="css/blog.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="css/editBlog.css?v=<?php echo time(); ?>">
        <!-- <script src="js/sprites/Mole.js"></script> -->
        <!-- <script src="js/sprites/Tractor.js"></script> -->
        <!-- <script src="js/javascript.js"></script> -->
    </head>
    <body>

    <div class="menu">
		<ul>
			<li><a href="index.php">Page index.php</a></li>
			<?php
				if ($data["isLoggedIn"]) {
					?>
					<li><a href="lobby.php">Page Lobby.php</a></li>
					<li><a href="?logout=true">Déconnexion</a></li>
					<li><a href="blog.php">Blog</a></li>
					<?php
				}
			?>
		</ul>
	</div>

        <div class="container">