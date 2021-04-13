<script src="js/game.js"></script>


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


	<div id="enemy-board-cards-container"></div>

	<div id="player-board-cards-container"></div>


	<section id="player-section">
		
		<div id="player-details">
			<div class="player-hp"></div>
			<div class="player-mp"></div>
			<div class="player-remaining-cards"></div>
		</div>


		<div id="player-cards-container"></div>
		

		<div id="player-actions-container">
			<button id="hero-power">Hero Power</button>
			<button id="end-turn">End Turn</button>
		</div>

	</section>

	<template id="cards-template">
			<h2></h2>
			<div class='attack'></div>
			<div class='hp'></div>
			<div class='cost'></div>
			<div class='mechanics'></div>
		</template>


<?php
	require_once("partials/footer.php");
