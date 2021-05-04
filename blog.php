<?php
    require_once("action/BlogAction.php");

    $action = new BlogAction();
    $data = $action->execute();

    require_once("partials/header.php");
?>
<h1>Voici la page Blog</h1>

<div id="blog-wrapper">

    <main>
        <div>Current Blog ID:<?= $_GET["id"] ?></div>
        <?php
                foreach ($data["blogPosts"] as $blogPost) {
                    if ($blogPost["id"] == $_GET["id"]) {
                        ?>
                        <div> <?= $blogPost["title"] ?> </div>
                        <div> <?= $blogPost["content"] ?> </div>

        <?php
                    }
                }
        ?>
    </main>

    <aside class="blog-summary-container">
        <?php
            if (sizeof($data["blogPosts"]) > 0) {
                foreach ($data["blogPosts"] as $blogPost) {
                    // $blogID = $blogPost["id"];
        ?>
                    <div class="blog-summary">
                    <div class="blog-title" ><a href="blog.php?id=<?=$blogPost["id"]?>" ><?= $blogPost["title"] ?><a></div>
        <?php
                }
            }	
        ?>

    </aside>
    
</div>



<?php
    require_once("partials/footer.php");