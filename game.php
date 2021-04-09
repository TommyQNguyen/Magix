<script src="js/game.js"></script>
<link rel="stylesheet" rel="stylesheet" href="css/game.css">

<?php
	require_once("action/GameAction.php");

	$action = new GameAction();
	$data = $action->execute();

    echo '<pre>';
	var_dump($_SESSION);
	echo '</pre>';


	require_once("partials/header.php");
?>

	<h3 id="remaining-turn-time">
		Remaining turn time
	</h3>

	<section id="enemy-section">
		<div id="enemy-cards-container"></div>

		<div id="enemy-details">
			<div class="enemy-hp"></div>
			<div class="enemy-user"></div>
			<div class="enemy-mp"></div>
		</div>

		<div class="enemy-remaining-cards"></div>

	</section>


	<section id="player-section">
		

		<div id="player-details">
			<div class="player-hp"></div>
			<div class="player-mp"></div>
			<div class="player-remaining-cards"></div>
		</div>


		<div id="player-cards-container"></div>

		<template id="player-cards-template">
			<h2></h2>
			<div class='attack'></div>
			<div class='hp'></div>
			<div class='cost'></div>
			<div class='mechanics'></div>
		</template>
		
	</section>


<?php
	require_once("partials/footer.php");
