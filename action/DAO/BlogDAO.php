<?php
    require_once("action/DAO/Connection.php");

    class UserDAO {

        public static function getBlogPosts() {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT * FROM blog");
            $statement->setFetchMode(PDO::FETCH_ASSOC); // <-- Permet de retourner un dictionnaire, ex: $row["username"], au lieu de $row[1]
            $statement->execute();

            // $user = null;

            $blog = $statement->fetchAll();
            // if ($row = $statement->fetch()) {
            //     if (password_verify($password, $row["password"])) {
            //         $user = $row; // $row["username"], $row["id"]
            //     }
            // }

            return $blog;
        }

        public static function updateProfile($user) {
            $connection = Connection::getConnection();
        }
    }