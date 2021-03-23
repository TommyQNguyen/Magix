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

			// if (isset($_POST["username"])) {
			// 	$user = UserDAO::authenticate($_POST["username"], $_POST["pwd"]);

			// 	if (!empty($user)) {
			// 		$_SESSION["username"] = $user["username"];
			// 		$_SESSION["visibility"] = $user["visibility"];

			// 		header("location:home.php");
			// 		exit;
			// 	}
			// 	else {
			// 		$hasConnectionError = true;
			// 	}
			// }

            if (isset($_POST["username"])) {

				$data = [];
				$data["username"] = $_POST["username"];
				$data["password"] = $_POST["password"];

                $result = parent::callAPI("signin", $data);
            

                if ($result == "INVALID_USERNAME_PASSWORD") {
                    // err
					$hasConnectionError = true;
                    // $hello = "INVALID_USERNAME_PASSWORD!";
                    var_dump($result);
                }
                else {
                    // Pour voir les informations retournées : var_dump($result);exit;
                    var_dump($result);

					// $_SESSION["username"] = $user["username"];
					// $_SESSION["visibility"] = $user["visibility"];

					$key = $result->key;
                    // var_dump($key);

					$_SESSION["visibility"] = 1;
					$_SESSION["key"] =  $key;

                    $key = $result->key;
                    var_dump($key);
                    // exit;

					

					header("location:lobby.php");
					exit;
                    

					// header("location:lobby.php");
					// exit;



                }
            }   

            return compact("hasConnectionError");
		}
	}