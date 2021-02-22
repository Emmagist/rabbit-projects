<?php
    require "config/init.php";

    class Users{

        public function getCategory(){
            global $db;

            return $db->selectData(TBL_CATEGORY, "*");
            
        }

        public function getState(){
            global $db;

            return $db->selectData(TBL_STATE, "*");
           
        }

        public static function checkTempTable($email){
            global $db;
            return $db->selectData(TBL_TEMPORARY_TABLE, "*", "email = '$email'");
        }

        public function insertTemporaryData($token,$email,$current_state,$category){
            global $db;
            return $db->saveData(TBL_TEMPORARY_TABLE, "csrf = '$token',email = '$email',current_state = '$current_state', category = '$category'");
        }

        public function insertUser($token,$first_name,$last_name,$email,$password_hash,$state,$phone_number,$address,$task,$image,$role,$verify,$date,$time,$status){
            global $db;
            return $db->saveData(TBL_USERS, "csrf = '$token', first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password_hash', state = '$state', phone_num = '$phone_number', address = '$address', task = '$task', image = '$image', role = '$role', verify = '$verify', date = '$date', time = '$time', status = '$status'");
        }

        public function updateTemporaryData($token ,$email,$current_state,$category){
            global $db;
            return $db->update(TBL_TEMPORARY_TABLE, "csrf = '$token',email = '$email',current_state = '$current_state', category = '$category'"," email = '$email'");
        }

        public function getAllUsers($token){
            global $db;
            return $db->selectData(TBL_USERS, "*", "csrf='$token'");
        }

        public function findUserByEmail($email){
            global $db;
            return $db->selectData(TBL_USERS, "*", "email = '$email'");
        }

        public function getTemporaryData($token){
            global $db;
            return $db->selectData(TBL_TEMPORARY_TABLE, "*", "csrf = '$token'");
        }
    }
    $usr = new Users;


?>