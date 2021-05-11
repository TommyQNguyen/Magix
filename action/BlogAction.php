<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/BlogDAO.php");

    class BlogAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {

            $blogPosts = BlogDAO::getBlogPosts();
            $comments = BlogDAO::getBlogComments();

            if (isset($_GET["idToDelete"])) {
				BlogDAO::deleteBlogPost($_GET["idToDelete"]);
			}

            if (!empty($_GET["commenter-name"]) && !empty($_GET["commenter-comment"])) {
                BlogDAO::addComment($_GET["commenter-name"], $_GET["commenter-comment"], $_GET["id"]);
                // $savedSuccessfully = true;
            }

            // var_dump($comments);
            // var_dump($_GET["id"]);
            // return [];
            return compact("blogPosts", "comments");
        }
    }