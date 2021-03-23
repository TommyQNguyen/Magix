<?php
    function execute() {
        $test = "Hello results";

        $results = file_get_contents("data/results.txt");

        

        $formattedDate = date("Y-m-d H:i:s", time()); // 2020-12-11 12:43:44

        return compact("test", "results");
    }