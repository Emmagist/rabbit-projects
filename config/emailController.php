<?php
    require "init.php";

    require_once 'vendor/autoload.php';

    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(EMAIL_PASSWORD);
    ;

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    

    class emailVerification{
        public function sendEmailVerification($email,$token){
            global $db, $mailer;
            $body = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verify Email</title>
            </head>
            <body>
               <div class="email_wrap">
                   <p>Thank you for signing up to our website. Please click on the link below to verify your email.</p>
                   <a href="http://localhost/rabbit-projects/email_verify.php?token=' . $token .'">Verify your email</a>
               </div> 
            </body>
            </html>';
            // Create a message
            $message = (new Swift_Message('Verify Your Email Address'))
            ->setFrom(EMAIL)
            ->setTo($email)
            ->setBody($body, 'text/html');
            // Send the message
            $result = $mailer->send($message);
        }
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
    $emailVer = new emailVerification;

?>