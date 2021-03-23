<script src="js/lobby.js"></script>

<?php

    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    echo '<pre>';
	var_dump($_SESSION);
	echo '</pre>';

    

    require_once("partials/header.php");
?>



    <div> Deja de retour... Alors, ce sera quoi aujourd'hui? </div>

    

    <div id="container">
		<canvas id="canvas">
			Not gonna happen...






		</canvas>
        <button>Pratique</button>
    <button>Jouer</button>
    <button>Quitter</button>
        <iframe style="width:700px;height:240px;" 
            src= <?= $data["chatboxSrc"] ?> >
        </iframe>
	</div>



    <!-- <iframe style="width:700px;height:240px;" 
        src= <?= $data["chatboxSrc"] ?> >
    </iframe> -->





<?php
    require_once("partials/footer.php");