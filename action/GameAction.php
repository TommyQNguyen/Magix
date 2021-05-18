<?php
	require_once("action/CommonAction.php");

	class GameAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {

			// Prendre la cle de session pour pouvoir render le chatbox dans la vue
            $key = $_SESSION["key"];
            $chatboxSrc = "https://magix.apps-de-cours.com/server/#/chat/" . $key;

			// $key = $_SESSION["key"];

            // API Call
            $data = [];
            $data["key"] = $_SESSION["key"];

            $result = parent::callAPI("games/state", $data);

            return compact("result", "chatboxSrc");
		}
	}
