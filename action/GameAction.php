<?php
	require_once("action/CommonAction.php");

	class GameAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {

            // $key = $_SESSION["key"];

            // $chatboxSrc = "https://magix.apps-de-cours.com/server/#/chat/" . $key;
			$key = $_SESSION["key"];

            // API Call
            $data = [];
            $data["key"] = $_SESSION["key"];

            $result = parent::callAPI("games/state", $data);
			// var_dump($result);

            return compact("result");

			// return [];
		}
	}
