
<?php
    require_once("partials/header.php");
    require_once("action/resultsAction.php");
    $formattedDate = date("Y-m-d H:i:s", time()); // 2020-12-11 12:43:44
    $data = execute();
?>

    


            <div class="results-container">
                <h1>
                    Résultats
                </h1>
                
                <div>2020-12-12 8:23:13 - 8.354 secondes</div>
                <div>2020-12-11 12:43:44 -  7.123 secondes</div>
                <div>2020-12-11 11:20:47 - 5.123 secondes</div>
                <div>2020-12-11 11:18:01 - 7.13 secondes</div>
                <div>2020-12-11 10:20:36 - 10.984 secondes</div>

                <?php
                $lines = explode("\n", $data["results"]); // tableau de lignes

                foreach ($lines as $line) {
                ?>
                    <div> <?= $formattedDate . " - " . (((float)$line)/1000) . " secondes" ?> </div>
            <?php
                }
            ?>

<?php
    require_once("partials/footer.php");
