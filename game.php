<script type="module" src="js/game.js"></script>
<link rel="stylesheet" href="css/game.css?v=<?php echo time(); ?>">
<!-- <script type="module" src="js/playerAction.js"></script> -->

<?php
	require_once("action/GameAction.php");

	$action = new GameAction();
	$data = $action->execute();

    // echo '<pre>';
	// var_dump($_SESSION);
	// echo '</pre>';


	// require_once("partials/header.php");
?>

<body id="game-body">

	<!-- <h1 id="game-status"></h1> -->

	<section id="enemy-section">
		<div id="enemy-cards-container"></div>

		<div id="enemy-details">
			<img id="enemy-avatar" alt="Enemy photo"/>
			<div class="enemy-user"></div>
			<div class="enemy-hp"></div>
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

			<div>
				<h3 id="remaining-turn-time">
				Remaining turn time
				</h3>
				<h3 id="your-turn"></h3>
			</div>

			<button id="end-turn">End Turn</button>
		</div>
	</section>

	

	<template id="cards-template">
		<img class="card-template-photo"/>
		<h2></h2>
		<div id="cards-template-stats-container">
			<div class='attack'></div>
			<div class='hp'></div>
			<div class='cost'></div>
		</div>
		<!-- <img class="card-template-photo"/> -->
		<div class='mechanics'></div>
		
	</template>

</body>

<?php
	// require_once("partials/footer.php");
