<script src="js/javascript.js"></script>

<?php

    require_once("action/IndexAction.php");

    $action = new IndexAction();
    $data = $action->execute();

    // echo '<pre>';
	// var_dump($_SESSION);
	// echo '</pre>';

    require_once("partials/header.php");
?>


    <body id="index-body">

        <!-- <span> <?=$data["test"]?> </span> -->

        <div class="login-form-frame">
            <form action="index.php" method="post">
                <?php
                    if ($data["hasConnectionError"]) {
                        ?>
                        <div class="error-div"><strong>Erreur : </strong>Connexion erronée</div>
                        <?php
                    }
                ?>

                <div class="form-label">
                    <label for="username">Nom d'usager : </label>
                </div>
                <div class="form-input">
                    <input type="text" name="username" id="username" />
                </div>
                <div class="form-separator"></div>

                <div class="form-label">
                    <label for="password">Mot de passe : </label>
                </div>
                <div class="form-input">
                    <input type="password" name="password" id="password" />
                </div>

                <div class="form-separator"></div>

                <div class="form-label">
                    &nbsp;
                </div>
                <div class="form-input">
                    <button id="index-button" type="submit">Connexion</button>
                </div>
                <div class="form-separator"></div>
            </form>
        </div>

    </body>

<?php
    require_once("partials/footer.php");