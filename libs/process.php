<?php
    require_once "config/init.php";
    require "user.php";

    //Temporary sign up button
    if (isset($_POST['get_started_button'])) {
        $error = '';
        $error = $val->userTemporaryStoreValidation($error);
        $email = $db->escape($_POST['email']);
        $current_state = $db->escape($_POST['current_state']);//exit;
        $category = $db->escape($_POST['category']);//exit;
        $token = $db->escape($_POST['token']);//exit;

        if ($usr->findUserByEmail($email)) {
            $error = "Email already exit!";
        }

        if (empty($error)) {

            if(Users::checkTempTable($email)){
                $tempResult = $usr->updateTemporaryData($token ,$email,$current_state,$category);
            }else{
                $tempResult = $usr->insertTemporaryData($token ,$email,$current_state,$category);
            }
        }
    }

    if (isset($_POST['create_account'])) {
        $error = '';
        $error = $val->userSignupValidation($error);
        $email = $db->escape($_POST['email']);
        $first_name = $db->escape($_POST['first_name']);//exit;
        $last_name = $db->escape($_POST['last_name']);//exit;
        $phone_number = $db->escape($_POST['phone_number']);//exit;
        $address = $db->escape($_POST['address']);//exit;
        $password = $db->escape($_POST['password']);//exit;
        $role = 3;//exit;
        $verify = "verify";//exit;
        $image = '';
        $date = date("yy/m/d");
        $time = date("H:i:s");
        $status = 0;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);//exit;

        if ($password < 8) {
            $error = "Password is less than 8 !";
        }
        // var_dump(Users::checkTempTable($email));exit;

        if (empty($error)) {
            if (Users::checkTempTable($email)) {
                foreach(Users::checkTempTable($email) as $user){
                    $token = $user['csrf'];
                    $state = $user['current_state'];//exit;
                     $task = $user['category'];//exit;
                   //  echo$user['email'];exit;
                   //validate email
                   if ($user['email'] !== $email) {
                       $error = "Email not valid!";
                       header("Location: signup.php");
                   }
                }
               //save data
               $insert = $usr->insertUser($token,$first_name,$last_name,$email,$password_hash,$state,$phone_number,$address,$task,$image,$role,$verify,$date,$time,$status); 
            //    var_dump($insert);exit;
               if (isset($insert)) {
                   $db->erase(TBL_TEMPORARY_TABLE, "email = '$email'");
               }
               $_SESSION['message-success'] = "An email has been sent to your email address <br> with a link to verify your email";//exit;
   
            }else {
                $error = "Email not valid !";
                header("Location: signup.php");
            }
            
        }
    }

    //Login button
    if (isset($_POST['login_button'])) {
        $error = "";
        $email = $db->escape($_POST['email']);//exit;
        $password = $db->escape($_POST['password']);//exit;
        $error = $val->loginValidation($error);//exit;
        // var_dump($usr->findUserByEmail($email));exit;

        if (empty($error)) {
            foreach ($usr->findUserByEmail($email) as $userInfo) {
                $role = $userInfo['role'];
                if ($password = $userInfo['password']) {
                    
                    if ($userInfo['role'] == 3) {
                        header("Location:user_dashboard.php?token=".$userInfo['csrf']);
                        $_SESSION['message-success'] = "Welcome . {$userInfo['full_name']} . Kindly take Covid-19 neasure to stay safe";
                    }elseif ($userInfo['role'] == 2) {
                        header("Location:tasker_dashboard.php");
                        $_SESSION['message-success'] = "Welcome . {$userInfo['full_name']} . Kindly take Covid-19 measure to stay safe";
                    }elseif ($userInfo['role'] == 1) {
                        header("Location:admin_dashboard.php");
                        $_SESSION['message-success'] = "Welcome . {$userInfo['full_name']} . Kindly take Covid-19 measure to stay safe";
                    }else {
                        header("Location:login.php");
                    }
                }
            }
        }
    }

    //To recover password using email
    if (isset($_POST['reset_password_btn'])) {
        $error = '';
        $email = $db->escape($_POST['email']);

        if (empty($email)) {
            $error = "Email is required";
        }

        if ($usr->findUserByEmail($email) === $email) {
            foreach ($$usr->findUserByEmail($email) as $key) {
                $token = $key['csrf'];
                if (isset($token)) {
                    sendPasswordResendLink($email, $token);
                    header("Location: reset_message.php");exit(0);
                }
            }
        }else {
            $error = "Your email is incorrect";
        }
    }

    //To reset new password button
    if (isset($_POST['recover_password_btn'])) {
        $error = '';
        $password = $db->escape($_POST['password']);
        $cPassword = $db->escape($_POST['c_password']);

        if (empty($password)) {
            $error = "Please enter a new password!!!";
        }elseif (empy($cPassword)) {
            $error = "Please confirm your new password!!!";
        }elseif($password < 8){
            $error = "Password is less than 8 !!!";
        }elseif ($password !== $cPassword) {
            $error = "Password not match!!!";
        }

        //hash password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        //grap email form the current session
        $email = $_SESSION['email'];

        if (empty($error)) {
            $db->update(TBL_USERS, "password = '$password_hash'", "email = '$email'");
            header("Location: login.php");
        }
    }
?>