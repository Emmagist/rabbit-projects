<?php 
    require "inc/head.php"; 
    require "inc/profile_nav.php";
    require "libs/process.php";
    // Session::checkSession();
    // Session::checkVerify();
    // $token = Session::get("csrf");
    // echo $token;exit;
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    }else{
        header("Location: login.php");
    }

    // var_dump($usr->getAllUsers($token));exit;
?>

<main>
    <div class="dashboard-wrapper">
        <?php require "inc/session_message.php";?>
        <h1 class="">Your Account</h1>
        <div class="row">
            <div class="col-md-3 dashboard-wrapper-col-one">
                <ul id="active_userdashboard_ul">
                    <li class="userdashboard_li active">Profile</li>
                    <li class="userdashboard_li">Password</li>
                    <li class="userdashboard_li">Notifications</li>
                    <li class="userdashboard_li">Billing Info</li>
                    <li class="userdashboard_li">Cancel a Task</li>
                    <li class="userdashboard_li">Account Balance</li>
                    <li class="userdashboard_li">Transactions</li>
                    <li class="userdashboard_li">Deactivate</li>
                </ul>
            </div>
            <div class="col-md-9 dashboard-wrapper-col-two">
                <div class="dashboard_wrapper_col_two_h5_div">
                    <span><button type="button" data-toggle="modal" data-target="#userDashboardModal" class="btn">Edit</button></span>
                    <h5 class="mt-5">Account </h5>
                </div>
                <div class="account-div col-md-12">
                    <div class="row mt-5 ml-3">
                        <?php foreach($usr->getAllUsers($token) as $key): ?>
                        <div class="account-div-one col-md-3"><img src="<?php $key['image'] ? $key['image'] : 'img/main-slider-2-2.jpg'?>" alt=""></div>
                        <div class="account-div-two col-md-9">
                            <ul>
                                <li><i class="fa fa-user"></i> <?=$key['first_name']. ' ' .$key['last_name']?></li>
                                <li><i class="fa fa-envelope"></i> <?=$key['email']?></li>
                                <li><i class="fa fa-home"></i> <?=$key['address']?></li>
                                <li class=""><i class="fa fa-home"></i> <?=$key['task']?></li>
                            </ul>
                            <?php endforeach; ?>
                            <a href="logout.php" class="btn profile-logout">Log Out</a>
                        </div>
                    </div>
                </div> 

                <!-- Change Password -->
                <h5 class="mt-5">Change Password</h5>
                <div class="account-div">
                    <form action="" method="post" class="form-group">
                        <?php require "inc/error_message.php";?>
                        <?php require "inc/session_message.php";?>
                        <input type="password" class="form-control mt-5" placeholder="Enter Current Password" name="current_password">
                        <input type="password" class="form-control mt-4" placeholder="Enter New Password" name="new_password">
                        <input type="password" class="form-control mt-4" placeholder="Confirm New Password" name="cPassword">
                        <button class="btn mt-5 cancel-password-button">Cancel</button><button class="btn change-password-button ml-5 mt-5" name="change_password">Save</button>
                    </form>
                </div>

                 <!--Notification  -->
                <h5 class="mt-5">Notications</h5>
                <div class="account-div">
                    <table class="table">
                        <thead class="table-title">
                            <tr>
                                <td><strong>Form of Notification</strong></td>
                                <td><b>Email</b></td>
                                <td><strong>SMS</strong></td>
                                <td><strong>Push Notification</strong></td>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                        <form action="" method="POST">
                            <tr>
                                <td>Task Updates</td>
                                <td><input type="checkbox" name="task_update_email" id=""></td>
                                <td><input type="checkbox" name="task_update_sms" id=""></td>
                                <td><input type="checkbox" name="task_update_push_notification" id=""></td>
                            </tr>
                            
                            <tr>
                                <td>Promotional Emails and Notifications</td>
                                <td><input type="checkbox" name="promotional_email" id=""></td>
                                <td><input type="checkbox" name="promotional_sms" id=""></td>
                                <td><input type="checkbox" name="promotional_push_notification" id=""></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn mt-5 cancel-password-button">Cancel</button><button class="btn change-password-button ml-5 mt-5" name="change_password">Save</button>
                    </form>

                </div>

                 <!--Edit Billing Info  -->
                 <h5 class="mt-5">Edit Billing Info</h5>
                <div class="account-div">
                    <form action=""></form>
                    <button class="btn mt-5 cancel-password-button">Cancel</button><button class="btn change-password-button ml-5 mt-5" name="change_password">Save</button>
                </div> 

                <!-- Cancel a task -->
                <h5 class="mt-5">Cancel a Task</h5>
                <div class="account-div">
                    <p>To cancel a task, go to your task and select a circle with three dots in the upper right corner of the task card. This will reveal the <span>'Cancel Task'</span> button. Select <span>'Cancel Task'</span> to cancle all the appointments for that task.</p>
                    <button class="btn change-password-button ml-5 mt-5" name="change_password">Goto my Tasks</button>
                </div> 

                <!-- Account Balance -->
                <h5 class="mt-5">Edit Billing Info</h5>
                <div class="account-div">
                    <h6><strong>Available account balance: $0</strong></h6>
                    <p>*Account balances are automatically applied when a task is completed.</p>
                    <form action="">
                        <label for="">Enter a redemption code:</label>
                        <input type="text" class="form-control">
                        <button class="btn mt-5 cancel-password-button">Cancel</button><button class="btn change-password-button ml-5 mt-5" name="change_password">Save</button>
                    </form>
                    
                </div>

                <!--Transactions  -->
                <h5 class="mt-5">Transaction History</h5>
                <div class="account-div text-center">
                    <h6>Download Transaction</h6>
                    <p>You don't have any transaction yet. <a href="#">Get started</a></p>
                </div>

                <!-- Account Deactivation -->
                <h5 class="mt-5">Account Deactivation</h5>
                <div class="account-div text-center">
                    <p>Once you've deactivated your account, you will no longer be able to be log in to this site or app. This action can not be undo.</p>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Deactivate Account</button>
                </div>
            </div>
        </div>
    </div>
    <div class="helper-wrapper">
        <a href="#" class="text-white"><i class="fa fa-question-circle"></i> <span>Help</span></a>
    </div>
</main>


<?php require "inc/modal.php"; ?>
<?php require "inc/profile_footer.php" ?>
