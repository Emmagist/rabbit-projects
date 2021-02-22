<?php
    require "inc/head.php";
    require "libs/process.php";
    // var_dump($usr->findUserByEmail($email));exit;
    // $session->checkLogin();
?>

<div class="login-wrapper">
    <h3 class="p-3">LogIn Here</h3>
    <form action="" method="POST">
        <?php require "inc/error_message.php";?>
        <?php require "inc/session_message.php";?>
        <input type="email" name="email" class="mt-4 p-4 form-control" placeholder="Email" required autocomplete="off"><br>
        <input type="password" name="password" class="mt-4 p-4 form-control" placeholder="Password" required autocomplete="off"><br>
        <button class=" mt-4 pb-5 pt-3 btn btn-success form-control" type="submit" name="login_button">Login</button>
    </form>
    <p class="text-center already-account mt-5">No account yet? <a href="signup.php">Sign Up</a></p>
    <p class="text-center already-account mt-5"><a href="password_reset.php">Forgot Password?</a></p>
</div>

<?php "inc/footer.php"; ?>