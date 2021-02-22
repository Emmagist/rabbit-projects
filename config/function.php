<?php
    require "init.php";

    class Functions{

        // Check if the csrf in the database is same to the one coming from the form
        public function checkCsrf($tag){
            global $db;
            $query = $db->select(TBL_USERS, '*', "csrf='$tag'");
            if ($tag != $query) {
                die("Error csrf not match !");
            }elseif ($tag === $query) {
                return true;
            }
        }
    }
    $fun = new Functions;

?>