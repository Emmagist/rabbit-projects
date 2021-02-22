<?php
    require "config/init.php";

    class emailVerification{
        public function sendPasswordResendLink($email, $token){
            $body = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Tasker</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                    <link rel="stylesheet" href="css/style.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                </head>
                <body>
                    <div class="email_verify_wrapper">
                        <p class="">Hello, <br>Kindly click on this link to reset your password.</p>
                        <a href="http://localhost/rabbit-projects/confirm_password_reset.php?password_token='.$token.'" class="">Reset password</a>
                    </div>
                </body>
                </html>
            ';

            //create a message
            $message = (new Swift_Message('Reset password'))
                ->setFrom(Email)
                ->setTo($user_email)
                ->setBody($body, 'text/html');
            //send message
            $result = $mail->send($message);
        }

        public function resetPassword($token){
            global $db;

            $result = $db->selectData(TBL_USERS, "*", "csrf = '$token'");
            if ($_SESSION['email'] === $result['email']) {
                header("Location: password_reset_form.php");
            }
        }
    }
    $emv = new emailVerification;

?>