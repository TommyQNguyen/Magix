<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/BlogDAO.php");

    class BlogAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {

            if (isset($_GET["idToDelete"])) {
				BlogDAO::deleteBlogPost($_GET["idToDelete"]);
			}

            $blogPosts = BlogDAO::getBlogPosts();

            // var_dump($blogPosts);
            // return [];
            return compact("blogPosts");
        }
    }