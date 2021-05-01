<?php
    require_once("action/BlogAction.php");

    $action = new BlogAction();
    $data = $action->execute();

    require_once("partials/header.php");
?>
<h1>Voici la page Blog</h1>
<div><?= $data["blogPosts"] ?></div>



<?php
    require_once("partials/footer.php");