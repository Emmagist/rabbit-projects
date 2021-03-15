<?php

    require "init.php";

    // addCategoryButton proccess
    if (isset($_POST['addCategoryButton'])) {
        $error = '';
        $addCategory = $db->escape($_POST['addCategory']);

        if (empty($_POST['addCategory'])) {
            $error = "Field can not be empty";
        }

        if (empty($error)) {
            $db->saveData(TBL_CATEGORY, "category = '$addCategory'");
            $_SESSION['message-success'] = "Category Added Successfully";
            header("Location: index.php");
        }
    }

?>