<!-- Animation -->
<script src="js/lobby.js"></script>
<link rel="stylesheet" href="css/lobby.css?v=<?php echo time(); ?>">

<?php
    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    // echo '<pre>';
	// var_dump($_SESSION);
	// echo '</pre>';

    require_once("partials/header.php");
?>

<body id="body-lobby">

    <!-- <h2 id="lobby-welcome">Bienvenue chez Magix</h2> -->

    <canvas id="canvas">
		Fireflies flying souls to heaven
	</canvas>

    <div id="lobby-container">
        <div class="lobby-button-container">
            <button><a href="?pratique=true">Pratique</a></button>
            <button><a href="?jouer=true">Jouer</a></button>
            <button><a href="blog.php?id=1">Blog</a></button>
            <button><a href="?logout=true">Quitter</a></button>
        </div>

        <iframe 
            style="width:700px; height:240px;" 
            src=<?= $data["chatboxSrc"] ?> 
            onload="applyStyles(this)"
        >
        </iframe>

	</div>

</body>

<?php
    require_once("partials/footer.php");