<?php
	require_once("action/GameAction.php");

	$action = new GameAction();
	$data = $action->execute();

    echo '<pre>';
	var_dump($_SESSION);
	echo '</pre>';


	require_once("partials/header.php");
?>
	<h1>Ceci est la page Game.php</h1>

	<p>Sur cette page, vous pourrez jouer a Magix</p>


<?php
	require_once("partials/footer.php");
