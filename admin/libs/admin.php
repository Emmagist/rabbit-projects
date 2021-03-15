<?php

    require "../config/db.php";

    class Admin{
        public function disabledUsers(){
            global $db;
            return $db->selectData(TBL_USERS, "*", "status = 2");
        }

        public function getCategory(){
            global $db;
            return $db->selectData(TBL_CATEGORY, "*");
        }

        public function getUsers(){
            global $db;
            return $db->selectData(TBL_USERS, "*", "role = 3");
        }

        public function getTasker(){
            global $db;
            return $db->selectData(TBL_USERS, "*", "role = 2");
        }
    }
    $admin = new Admin;

?>