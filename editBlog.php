<?php
    require_once("action/EditBlogAction.php");

    $action = new EditBlogAction();
    $data = $action->execute();

    require_once("partials/header.php");
?>
<h1 id="edit-blog-page-title">Vous pouvez modifer votre contenu ici!</h1>

<body id="edit-blog-body">

    <div id="edit-blog-wrapper">

        

        <main>
            <?php
                foreach ($data["blogPost"] as $blogPost) {
            ?>
                <div id="edit-blog-article-title"> <?= $blogPost["title"] ?> </div>
                
                <!-- <div> <?= $blogPost["content"] ?> </div> -->
                <form id="edit-blog-form" action="editBlog.php" method="get">
                    <label class="edit-blog-article-label">ID de l'article: </label>
                    <textarea readonly id="edit-blog-id" name="idToUpdate" cols="3" rows="1"><?= $_GET["idToUpdate"] ?></textarea>

                    <label id="edit-blog-article-label">Contenu de l'article</label>
                    <textarea id="edit-blog-content" name="text" cols="30" rows="10"><?= $blogPost["content"] ?></textarea>



                    <button id="button-save-edit">Sauvegarder</button>
                </form>

                <?php 
                    if ($data["savedSuccessfully"]) {
                ?>
                    <div class="success-div"><strong>Succès : </strong>Sauvegarde effectuée</div>
                <?php
            }
        ?>

            <?php
                }
            ?>
        </main>

    </div>

</body>

<?php
    require_once("partials/footer.php");