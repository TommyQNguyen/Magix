<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/BlogDAO.php");

    class EditBlogAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            $savedSuccessfully = false;
            $blogPost = BlogDao::getSingleBlogPost($_GET["idToUpdate"]);

            if (!empty($_GET["text"])) {
                BlogDAO::editBlogPost($_GET["text"], $_GET["idToUpdate"]);
                // var_dump($_GET["text"]);
                $savedSuccessfully = true;
            }


            // if (!empty($_GET["id"]))
            //     var_dump($_GET["id"]);

            // var_dump($_GET);

            return compact("blogPost", "savedSuccessfully");
        }
    }