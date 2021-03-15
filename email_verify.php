<?php
    require "inc/head.php";
    require "libs/init.php";
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    }
?>

<div class="border col-md-4 offset-md-4 p-5 mt-5">
    <p class="text-center">Thanks for verifying your email address. Kindly click the button below to verify and continue using TaskerApp on the Go.</p>
    <form action="" method="post">
        <?php require "inc/error_message.php";?>
        <?php require "inc/session_message.php";?>
        <input type="hidden" name="token" value="<?=$token?>" class="form-control">
        <button class="btn btn-success" name="update_verified_button">Verify me</button>
    </form>
</div>