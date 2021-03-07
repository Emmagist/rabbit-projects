<?php
    require_once "config/init.php";
    require "init.php";

    //$error = array();
    //Temporary sign up button
    if (isset($_POST['get_started_button'])) {
        $error = '';
        $error = $val->userTemporaryStoreValidation($error);
        $email = $db->escape($_POST['email']);
        $current_state = $db->escape($_POST['current_state']);//exit;
        $category = $db->escape($_POST['category']);//exit;
        $token = $db->escape($_POST['token']);//exit;

        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $error = "Email address is invalid";
        // }
        
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
        $error         = '';
        $error         = $val->userSignupValidation($error);
        $email         = $db->escape($_POST['email']);
        $first_name    = $db->escape($_POST['first_name']);//exit;
        $last_name     = $db->escape($_POST['last_name']);//exit;
        $phone_number  = $db->escape($_POST['phone_number']);//exit;
        $address       = $db->escape($_POST['address']);//exit;
        $password      = $db->escape($_POST['password']);//exit;
        $role          = 3;//exit;
        $verify        = "verify";//exit;
        $image         = '';
        $date          = date("yy/m/d");
        // $time          = date("H:i:s");
        $status        = 0;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);//exit;

        if ($password < 8) {
            $error = "Password is less than 8 !";
        }
        if ($phone_number != '090' || '081' || '070' || '091' || '080') {
            $eror = 'invalid phone number';
        }

        if (empty($error)) {
            if (Users::checkTempTable($email)) {
                foreach(Users::checkTempTable($email) as $user){
                    $token = $user['csrf'];
                    $state = $user['current_state'];//exit;
                     $task = $user['category'];//exit;

                   //validate email
                   if ($user['email'] !== $email) {
                       $error = "Email not valid!";
                       //header("Location: signup.php");
                    }
                    if ($usr->findUserByEmail($email)) {
                        $error = "Email already exit!";
                        //header("Location: signup.php");
                    }
                }
               //save data
               $insert = $usr->insertUser($token,$first_name,$last_name,$email,$password_hash,$state,$phone_number,$address,$task,$image,$role,$verify,$date,$status); 
                //    var_dump($insert);exit;
                // if (isset($insert)) {
                //     $id = $db->lastId($insert);
                //     var_dump($id);exit;
                // }

                $emailVer->sendEmailVerification($email,$token);
               if (isset($insert)) {
                   $db->erase(TBL_TEMPORARY_TABLE, "email = '$email'");
               }
               $_SESSION['message-success'] = "An email has been sent to your email address <br> with a link to verify your email";//exit;
               exit();
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
        $user = $usr->findUserByEmail($email);
        
        if ($user) {
            foreach ($user as $key) {
                if ($key['status'] = 2) {
                    $error = "Account disabled by you!";
                }
                if (empty($userInfo['csrf'])) {
                    $error = "Invalid token or token not found!!!";
                }
            }
        }

        if (empty($error)) {
            if ($usr->findUserByEmail($email)) {
                foreach ($usr->findUserByEmail($email) as $userInfo) {
                    // $role = $userInfo['role'];
                    if ($password = $userInfo['password']) {
                        
                        if ($userInfo['role'] == 3) {
                            header("Location:user_dashboard.php?token=".$userInfo['csrf']);
                            $_SESSION['message-info'] = "Welcome " . ucwords($userInfo['last_name']) . " Kindly take Covid-19 measure to stay safe";
                        }elseif ($userInfo['role'] == 2) {
                            header("Location:tasker_dashboard.php");
                            $_SESSION['message-info'] = "Welcome " . ucwords($userInfo['last_name']) . " Kindly take Covid-19 measure to stay safe";
                        }elseif ($userInfo['role'] == 1) {
                            header("Location:admin_dashboard.php");
                            $_SESSION['message-info'] = "Welcome " . ucwords($userInfo['last_name']) . " Kindly take Covid-19 measure to stay safe";
                        }else {
                            header("Location:login.php");
                        }
                    }
                }
                exit();
            }else {
                $error = "Email not found!!!";
                header("Location: login.php");
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

    if (isset($_POST['change_password'])) {
        $error = '';
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $cPassword = $_POST['cPassword'];
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        //check empty input
        if (empty($_POST['current_password'])) {
            $error = "Please provide current password!";
        }

        if (empty($_POST['new_password'])) {
            $error = "Please provide a new password!";
        }
        
        if (empty($_POST['cPassword'])) {
            $error = "Password not match!";
        }

        if ($usr->findUserByPassword($current_password)) {
            $error = "Current password not valid. Please try another!";
        }

        if (empty($error)) {
            $db->update(TBL_USERS, "password = '$password_hash'", "password = '$current_password'");
            $_SESSION['message-success'] = "Password changed successfully";
            // header("Location: user_dashboard.php");
        }
    }
    
    // Deactivate Button
    if (isset($_POST['deactivate_button'])) {
       $token = $_POST['user_token'];
       if (!empty($token)) {
          $re =  $db->update(TBL_USERS, "status = 2", "csrf = '$token'");
        //   var_dump($re);exit;
           $_SESSION['message-success'] = "Account Deactivated Successfully";
           header("Location: index.php");
       }
    }
?>