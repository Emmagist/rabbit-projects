<?php
    require "inc/head.php";
    require "libs/process.php";
    // var_dump($usr->findUserByEmail($email));exit;
    // $session->checkLogin();
?>

<div class="password_rest">
    <h3 class="text-center">Reset Password</h3>
    <form action="" method="POST">
        <div class="form-group">
        <input type="text" class="form-control mt-5" placeholder="Enter Your Email" name="email">
        <button class="btn btn-primary form-control mt-4" name="reset_password_btn">Reset Password</button>
        <a href="login.php" class=" mt-5" >Cancel</a>
        </div>
    </form>
</div>