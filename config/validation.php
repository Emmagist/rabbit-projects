<?php
    require_once "init.php";
    // require "libs/user.php";

    class Validation{
        public function userTemporaryStoreValidation($error){
            if (empty($_POST['current_state'])) {
                $error = "Please choose your current state!";
            }
            if (empty($_POST['email'])) {
                $error = "Please enter an email!";
            }
            if (empty($_POST['category'])) {
                $error = "Please choose a category!";
            }
            if (empty($_POST['token'])) {
                $error = "Error!!! Please reload your browser and fill the form again";
            }

            return $error;
        }

        public function userSignupValidation($error){
            if (empty($_POST['email'])) {
                $error = "Enter your email!";
            }elseif (empty($_POST['first_name'])) {
                $error = "Enter your first name!";
            }elseif (empty($_POST['last_name'])) {
                $error = "Enter your last name!";
            }elseif (empty($_POST['phone_number'])) {
                $error = "Enter your phone number!";
            }elseif (empty($_POST['password'])) {
                $error = "Enter your password!";
            }elseif (empty($_POST['address'])) {
                $error = "Enter your address!";
            }
        }

        public function loginValidation($error){
            if (empty($_POST['email'])) {
                $error = "Email is required !";
            }elseif (empty($_POST['password'])) {
                $error = "Password is required !";
            }
        }
    }
    $val = new Validation;
?>