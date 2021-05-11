<?php
    require_once("action/DAO/Connection.php");

    class BlogDAO {

        public static function getBlogPosts() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT * FROM blog");
            $statement->setFetchMode(PDO::FETCH_ASSOC); // <-- Permet de retourner un dictionnaire, ex: $row["username"], au lieu de $row[1]
            $statement->execute();

            $blog = $statement->fetchAll();

            return $blog;
        }

        public static function getSingleBlogPost($id) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT * FROM blog WHERE id = ?");
            $statement->bindParam(1, $id);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();

            $blog = $statement->fetchAll();

            return $blog;
        }

        public static function deleteBlogPost($id) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("DELETE FROM blog WHERE id = ?");
            $statement->bindParam(1, $id);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
        }

        public static function editBlogPost($content, $id) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("UPDATE blog SET content = ? WHERE id = ?");
            $statement->bindParam(1, $content);
            $statement->bindParam(2, $id);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
        }

/* ----------------------------------------Section Commentaires----------------------------------------------------- */

        public static function getBlogComments() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT * FROM comments");
            $statement->setFetchMode(PDO::FETCH_ASSOC); // <-- Permet de retourner un dictionnaire, ex: $row["username"], au lieu de $row[1]
            $statement->execute();

            $comments = $statement->fetchAll();

            return $comments;
        }

        public static function addComment($name, $content, $blogID) {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("INSERT INTO comments(commenter, comment, blogID) VALUES (?, ?, ?);");
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $content);
            $statement->bindParam(3, $blogID);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
        }

        public static function updateProfile($user) {
            $connection = Connection::getConnection();
        }



    }