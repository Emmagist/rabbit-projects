<?php

    require "init.php";

    $error = $val->editUserAccount();
    $firstName = $db->escape($_POST['firstName']);
    $lastName = $db->escape($_POST['lastName']);
    $email = $db->escape($_POST['email']);
    $address = $db->escape($_POST['address']);
    $task = $db->escape($_POST['task']);

    if (empty($error)) {
        $db->update(TBL_USERS, "first_name = '$firstName', last_name = '$lastName', email = '$email', address = '$address', task = '$task'");
    }


?>