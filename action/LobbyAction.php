<?php
	require_once("action/CommonAction.php");

	class LobbyAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {

			// Prendre la cle de session pour pouvoir render le chatbox dans la vue
            $key = $_SESSION["key"];
            $chatboxSrc = "https://magix.apps-de-cours.com/server/#/chat/" . $key;

			// Si le joueur appuie sur le bouton Pratique
			if (!empty($_GET["pratique"])) {
				// API Call
				$data = [];
				$data["key"] = $_SESSION["key"];
				$data["type"] = "TRAINING";

                $result = parent::callAPI("games/auto-match", $data);
            
                if ($result == "INVALID_KEY" || 
				$result == "INVALID_GAME_TYPE" || 
				$result == "DECK_INCOMPLETE" || 
				$result == "MAX_DEATH_THRESHOLD_REACHED") {
					
                    // Afficher le message d'erreur
                    var_dump($result);
                }
                else {
                    // Pour voir les informations retournées : var_dump($result);exit;
                    var_dump($result);
					// header("location:game.php");
					// exit;
                }

			}
			else if (!empty($_GET["jouer"])) {

				// API Call
				$data = [];
				$data["key"] = $_SESSION["key"];
				$data["type"] = "PVP";

                $result = parent::callAPI("games/auto-match", $data);
            
                if ($result == "INVALID_KEY" || 
				$result == "INVALID_GAME_TYPE" || 
				$result == "DECK_INCOMPLETE" || 
				$result == "MAX_DEATH_THRESHOLD_REACHED") {
					
                    // Afficher le message d'erreur
                    var_dump($result);
                }
                else {
                    // Pour voir les informations retournées : var_dump($result);exit;
                    var_dump($result);
					// header("location:game.php");
					// exit;
                }
			}


			return compact("chatboxSrc");
		}
	}
