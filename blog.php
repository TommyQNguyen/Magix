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


                    <div id="comment-section-title">Les commentaires sur cet article</div>
            <?php
                    foreach ($data["comments"] as $comment) {
                        if ($comment["blogID"] == $_GET["id"]) {
                            ?>
                            <!-- <div > <?= $comment["blogID"] ?> </div>
                            <div > <?= $_GET["id"] ?> </div> -->

                            <div class="comment-section">
                                
                                <div id="commenter">Par: <?= $comment["commenter"] ?> </div>
                                <div id="blog-comment"> <?= $comment["comment"] ?> </div>
                                
                            </div>
            <?php
                        }
                    }
            ?>

                <form id="comment-form" action="blog.php" method="get">
                    <div id="comment-form-title">Ajouter votre commentaire:</div>
                    <!-- <div > <?= $_GET["id"] ?> </div>  -->

                    <label id="comment-form-id">ID de commentaire: </label>
                    <textarea readonly id="form-comment-id" name="id" cols="3" rows="1"><?= $_GET["id"] ?></textarea>

                    <label id="label-commenter">Nom: </label>
                    <textarea id="textarea-commenter" name="commenter-name" cols="3" rows="1"></textarea>

                    <label id="label-comment">Commentaire: </label>
                    <textarea id="textarea-comment" name="commenter-comment" cols="30" rows="10"></textarea>

                    <button id="button-save-comment">Envoyer</button>
                </form>
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