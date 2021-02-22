<?php 
    require "inc/head.php"; 
    require "inc/profile_nav.php";
    require "libs/user.php";
    // Session::checkSession();
    // Session::checkVerify();
    // $token = Session::get("csrf");
    // echo $token;exit;
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    }

    // var_dump($usr->getAllUsers($token));exit;
?>

<main>
    <div class="dashboard-wrapper">
        <?php require "inc/session_message.php";?>
        <h1 class="">Your Account</h1>
        <div class="row">
            <div class="col-md-3 dashboard-wrapper-col-one">
                <ul>
                    <li class="active">Profile</li>
                    <li>Password</li>
                    <li>Notifications</li>
                    <li>Billing Info</li>
                    <li>Cancel a Task</li>
                    <li>Account Balance</li>
                    <li>Transactions</li>
                    <li>Deactivate</li>
                </ul>
            </div>
            <div class="col-md-9 dashboard-wrapper-col-two">
                <h5 class="mt-5">Account <span><button type="button" data-toggle="modal" data-target="#userDashboardModal" class="btn">Edit</button></span></h5>
                <div class="account-div col-md-12">
                    <div class="row mt-5 ml-3">
                        <?php foreach($usr->getAllUsers($token) as $key): ?>
                        <div class="account-div-one col-md-3"><img src="<?php $key['image'] ? $key['image'] : 'img/main-slider-2-2.jpg'?>" alt=""></div>
                        <div class="account-div-two col-md-9">
                            <ul>
                                <li><i class="fa fa-user"></i><?=$key['first_name']. ' ' .$key['last_name']?></li>
                                <li><i class="fa fa-envelope"></i><?=$key['email']?></li>
                                <li><i class="fa fa-map-marker-alt"></i><?=$key['address']?></li>
                                <li class=""><i class="fa fa-home"></i><?=$key['task']?></li>
                            </ul>
                            <?php endforeach; ?>
                            <button type="button" class="btn profile-logout"><a href="logout.php">Log Out</a></button>
                        </div>
                    </div>
                </div> 

                <!-- Change Password -->
                <!-- <h5 class="mt-5">Change Password</h5>
                <div class="account-div">
                    <form action="" method="post" class="form-group">
                        <input type="text" class="form-control mt-5" placeholder="Enter Current Password">
                        <input type="text" class="form-control mt-4" placeholder="Enter New Password">
                        <input type="text" class="form-control mt-4" placeholder="Confirm New Password">
                        <button class="btn mt-5 cancel-password-button">Cancel</button><button class="btn change-password-button ml-5 mt-5">Save</button>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
    <div class="helper-wrapper">
        <a href="#" class="text-white"><i class="fa fa-question-circle"></i> <span>Help</span></a>
    </div>
</main>


<?php require "inc/modal.php"; ?>
<?php require "inc/profile_footer.php" ?>
