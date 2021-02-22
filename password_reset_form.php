<?php
    require "inc/head.php";
    require "libs/process.php";
?>

<div class="password_rest">
    <h3 class="text-center">Recover Your Password</h3>
    <form action="" method="POST">
        <div class="form-group">
        <input type="password" class="form-control mt-5" placeholder="Enter new password" name="password">
        <input type="password" class="form-control mt-5" placeholder="Enter new password" name="c_password">
        <button class="btn btn-primary form-control mt-4" name="recover_password_btn">Recover Password</button>
        </div>
    </form>
</div>