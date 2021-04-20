<?php
    require_once("action/CommonAction.php");

    class AjaxPlayerAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            $key = $_SESSION["key"];

            
            switch ($_POST["type"]) {

                case "END_TURN": {
                    $data = [];
                    $data["key"] = $key;
                    $data["type"] = $_POST["type"];

                    $result = parent::callAPI("games/action", $data);

                    return compact("result");
                    }
                
                case "HERO_POWER": {
                    $data = [];
                    $data["key"] = $key;
                    $data["type"] = $_POST["type"];

                    $result = parent::callAPI("games/action", $data);

                    return compact("result");
                    }

                case "PLAY": {
                    $data = [];
                    $data["key"] = $key;
                    $data["type"] = $_POST["type"];
                    $data["uid"] = $_POST["cardId"];

                    $result = parent::callAPI("games/action", $data);

                    return compact("result");
                    }



            }



        }
    }