<?php
    require_once("action/AjaxPlayerAction.php");

    $action = new AjaxPlayerAction();
    $data = $action->execute();

    echo json_encode($data["result"]);