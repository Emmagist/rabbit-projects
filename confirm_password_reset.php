<?php

    require "libs/email_verification.php";

    if (isset($_GET['password_token'])) {
        $token = $_GET['password_token'];
        $emv->resetPassword($token);
    }

?>