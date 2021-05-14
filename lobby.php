<!-- Animation -->
<script src="js/lobby.js"></script>
<link rel="stylesheet" href="css/lobby.css?v=<?php echo time(); ?>">

<?php

    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    echo '<pre>';
	// var_dump($_SESSION);
	echo '</pre>';

    require_once("partials/header.php");
?>

<body id="body-lobby">

    <div id="lobby-welcome"> Deja de retour... Alors, ce sera quoi aujourd'hui? </div>


    <div id="lobby-container">
		

        <div class="lobby-button-container">
            <button><a href="?pratique=true">Pratique</a></button>
            <button><a href="?jouer=true">Jouer</a></button>
            <button><a href="?logout=true">Quitter</a></button>
        </div>

        <iframe 
            style="width:700px;height:562px;" 
            src=<?= $data["chatboxSrc"] ?> 
            onload="applyStyles(this)"
        >
        </iframe>

	</div>

    <!-- <canvas id="canvas">
		Sakura petals
	</canvas> -->

</body>

<?php
    require_once("partials/footer.php");