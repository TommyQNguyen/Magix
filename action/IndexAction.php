<?php
	require_once("action/CommonAction.php");
	// require_once("action/DAO/UserDAO.php");

	class IndexAction extends CommonAction {
		// phpc / phpx

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
			$hasConnectionError = false;

            if (isset($_POST["username"])) {

				$data = [];
				$data["username"] = $_POST["username"];
				$data["password"] = $_POST["password"];

                $result = parent::callAPI("signin", $data);
            
                if ($result == "INVALID_USERNAME_PASSWORD") {
					$hasConnectionError = true;
                }
                else {
                    // Pour voir les informations retournées : var_dump($result);exit;
                    // var_dump($result);

					$key = $result->key;

					$_SESSION["visibility"] = 1;
					$_SESSION["key"] =  $key;

                    $key = $result->key;

					header("location:lobby.php");
					exit;
                }
            }   

            return compact("hasConnectionError");
		}
	}