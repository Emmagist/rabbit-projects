<?php
    require_once "init.php";
    // require "libs/user.php";

    class Validation{
        public function userTemporaryStoreValidation($error){
            if (empty($_POST['current_state'])) {
                $error = "Please choose your current state!";
            }elseif (empty($_POST['email'])) {
                $error = "Please enter an email!";
            }elseif (empty($_POST['category'])) {
                $error = "Please choose a category!";
            }
            // elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //     $error = "Email address is invalid";
            // }
            

            return $error;
        }

        public function userSignupValidation($error){
            if (empty($_POST['email'])) {
                $error = "Enter your email!";
            }
            if (empty($_POST['first_name'])) {
                $error = "Enter your first name!";
            }
            if (empty($_POST['last_name'])) {
                $error = "Enter your last name!";
            }
            if (empty($_POST['phone_number'])) {
                $error = "Enter your phone number!";
            }
            if (empty($_POST['password'])) {
                $error = "Enter your password!";
            }
            if (empty($_POST['address'])) {
                $error = "Enter your address!";
            }
        }

        public function loginValidation($error){
            if (empty($_POST['email'])) {
                $error = "Email is required !";
            }
            if (empty($_POST['password'])) {
                $error = "Password is required !";
            }
        }

        // editUserAccount
        public function editUserAccount(){
            if (empty($_POST['firstName'])) {
                $error = "Enter your first name!";
            }
            if (empty($_POST['lastName'])) {
                $error = "Enter your last name!";
            }
            if (empty($_POST['email'])) {
                $error = "Enter your email address!";
            }
            if (empty($_POST['address'])) {
                $error = "Enter your home address!";
            }
            if (empty($_POST['task'])) {
                $error = "Enter your task!";
            }
        }
    }
    $val = new Validation;
?>