<?php
    require_once("action/BlogAction.php");

    $action = new BlogAction();
    $data = $action->execute();

    require_once("partials/header.php");
?>
<h1 id="page-title">Bienvenue au guide de stratégie de Magix!</h1>

<body id="blog-body">

    <div id="blog-wrapper">

        <main>
            <!-- <div>Current Blog ID:<?= $_GET["id"] ?></div> -->
            <?php
                    foreach ($data["blogPosts"] as $blogPost) {
                        if ($blogPost["id"] == $_GET["id"]) {
                            ?>
                            <h2 id="article-title"> <?= $blogPost["title"] ?> </h2>
                            <div id="article-content"> <?= $blogPost["content"] ?> </div>
                            <div class="button-container">
                                <button id="button-delete"><a href="blog.php?idToDelete=<?=$blogPost["id"]?>" >Delete</button>
                                <button id="button-edit"><a href="editBlog.php?idToUpdate=<?=$blogPost["id"]?>" >Edit</a></button>
                            </div>

            <?php
                        }
                    }
            ?>
        </main>

        <aside class="blog-summary-container">
            <h2 id="blog-summary-title">🌸 Les articles du blog 🌸<h2>

            <?php
                if (sizeof($data["blogPosts"]) > 0) {
                    foreach ($data["blogPosts"] as $blogPost) {
            ?>

                        <div class="blog-summary-article" ><a href="blog.php?id=<?=$blogPost["id"]?>" ><?= $blogPost["title"] ?></a></div>
            <?php
                    }
                }	
            ?>

        </aside>

    </div>

</body>

<?php
    require_once("partials/footer.php");