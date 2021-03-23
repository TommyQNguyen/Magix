<?php
	require_once("action/CommonAction.php");

	class LobbyAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {

            $key = $_SESSION["key"];

            $chatboxSrc = "https://magix.apps-de-cours.com/server/#/chat/" . $key;

			return compact("chatboxSrc");
		}
	}
