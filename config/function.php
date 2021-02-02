<?php

    class Functions{
        //Pass the SQL back for debugging
        public function getSql() {
            global $db;
            $val = $db->$this->myQuery;
            $this->myQuery = array();
            echo $val;
        }

        // Check if the csrf in the database is same to the one coming from the form
        public function checkCsrf($csrf){
            global $db;
            $query = $db->select(TBL_USERS, '*', "csrf='$csrf'");
            if ($csrf != $query) {
                die("Error csrf not match !");
            }elseif ($csrf === $query) {
                return true;
            }
        }
    }

?>