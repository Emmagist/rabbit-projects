<?php
    require "inc/head.php";
    require "inc/nav.php";
    require "libs/process.php";

    $token = $db->_tokenGen();
    // var_dump($token);exit;

?>
<!-- signup page main -->
<main class="signup-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8"><img src="img/main-slider-2-2.jpg" alt="" width="100%" height="90%"></div>
            <div class="col-md-4 signup-div" id="signup_div">
                <?php //var_dump($usr->getState());exit; ?>
                
                
                 <?php 
                    
                 if(empty($tempResult)): ?>
                <h3>Earn money your way</h3>
                <p>See how much you can make tasking on Taskvendor</p>
                <div class="">
                   <form action="" method="POST" class="form-group">
                        <?php require "inc/error_message.php";?>
                        <?php require "inc/session_message.php";?>
                        <!-- <div class="alert alert-danger">
                            <li>danger</li>
                        </div>
                        <div class="alert alert-success">
                            <li>danger</li>
                        </div> -->
                        <label for="" class="label">Enter email</label>
                        <input type="email" name="email" class="form-control">
                        <label for="" class="label">Select your area</label>
                        <select name="current_state" id="" class="form-control mb-3">
                            <option value=""></option>
                            <option value="">Select State</option>
                            <?php foreach ($usr->getState() as $key) : ?>
                            <option value="<?=$key['current_state'];?>"><?=$key['current_state'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label for="" class="label">Choose a Category</label>
                        <select name="category" id="" class="form-control mb-3">
                                <option value=""></option>
                            <option value="">Choose a Category</option>
                            <?php foreach ($usr->getCategory() as $key) : ?>
                            <option value="<?=$key['category'];?>"><?=$key['category'];?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="token" class="form-control" value="<?=$token;?>">
                        <p>#13000 <span>per hour</span></p>
                        <button class="mt-2 mb-2 p-2 signup-div-button" type="submit" name="get_started_button">Get started</button>
                    </form>
                </div>
                <div class="">
                
                    <p class="text-center already-account">Already have an account? <a href="login.php">Sign in</a></p>
                </div>
                  <?php else : ?>
                    <h3>Create Your Account</h3>
                <div class="">
                   <form action="" method="POST" class="form-group">
                        <?php require "inc/error_message.php";?>
                        <?php require "inc/session_message.php";?>
                        <input type="text" readonly class="form-control mb-3" name="email" value="<?=$email?>">
                        <input type="text" class="form-control mb-3" placeholder="First Name" name="first_name">
                        <input type="text" class="form-control mb-3" placeholder="Last Name" name="last_name">
                        <input type="number" class="form-control mb-3" placeholder="Mobile Number" name="phone_number">
                        <input type="password" class="form-control mb-3" placeholder="Password" name="password">
                        <input type="text" class="form-control mb-3" placeholder="Address" name="address" >
                        <button type="submit" class="btn btn-primary form-control" name="create_account">Create Account</button>
                    </form>
                </div>
                <div class="">
                
                    <p class="text-center already-account">By clicking "create account" you agreed to our <a href="term_service.php">Terms of Service</a> and have read and acknowledge our <a href="privacy_police">Privacy Policy</a></p>
            </div>
            <?php endif;?>
        </div>
    </div>
    <div class="col-md-12 midcol-wrapper container mt-5>
        <h3 class="text-center</h3>
        <h3 class="text-center">Flexible Work at your finger tips</h3>
        <p class="text-center">Find local jobs that fit your skills and schedule. <br> With TaskRabbit, you have the freedom and <br> support to be your own boss.</p>
        <div class="row">
            <div class="col-md-4">
                <h4>Be your own boss</h4>
                <p>Work how, when and you want. Offer <br> services in 50+categories and set a <br>flexible schedule and work area.</p>
            </div>
            <div class="col-md-4">
                <span class="fa fa-money"></span>
                <h4>Set Your own rates</h4>
                <p>You keep 100% of what you charge, plus tips! <br> Invoice and get paid directly through our <br> secure payment system.</p>
            </div>
            <div class="col-md-4">
                <h4>Grow your business</h4>
                <p>We connect you with clients in your area, and <br> ways to maret yourself-so you can focus <br> on what you do best.</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <div class="row">
            <div class="col-md-8"><img src="img/main-slider-2-2.jpg" alt="" width="100%" height="60%"></div>
            <div class="col-md-4 signup-div">
                <h3>What is Taskvendor?</h3>
                <p>Taskvendor connects busy people in need of <br> help with trusted local Taskers who can lend <br> a hand with everything from home repairs to <br> errands. As a Tasker, you can get paid to do <br> what you love, where and when you want - <br> all while saving the day of someone in your <br> city.</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 reg-response ml-4">
        <h3 class="text-center ">Getting Started</h3>
        <div class="row reg-response-row">
            <div class="col-md-  col-col">
                <span class="glyphicon-glyphicon-plus-sign"></span>
                <h4>1. Sign up</h4>
                <p>Create your account. Then download the <br> Tasker app to continue registrtion.</p>
            </div>
            <div class="col-md-" id="col-col">
                <h4>2. Build your profile</h4>
                <p>Select what services you want to offer and <br> where.</p>
            </div>
            <div class="col-md-">
                <h4>3. Verify your eligibility to task</h4>
                <p>Confirm your identity and submit business <br> verifications, as required.</p>
            </div>
        </div>
        <div class="row mt-5 reg-response-row">
            <div class="col-md- col-col">
                <h4>4. Pay registration fee</h4>
                <p>In applicable cities, we charge #950 <br> registration fee that help us to provide <br> the best services to you.</p>
            </div>
            <div class="col-md-">
                <h4>5. Set your schedule and <br> work area</h4>
                <p>Set your weekly availability and opt in to <br> receive same-day jobs.</p>
            </div>
            <div class="col-md-">
                <h4>6. Start getting jobs</h4>
                <p>Grow your business on your own terms.</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 reg-response-two ml-4">
        <h3 class="text-center ">Getting Started</h3>
        <div class="row reg-response-row-two">
            <div class="col-md-  col-col">
                <span class="glyphicon-glyphicon-plus-sign"></span>
                <h4>1. Sign up</h4>
                <p>Create your account. Then download the Tasker app to continue registrtion.</p>
            </div>
            <div class="col-md-" id="col-col">
                <h4>2. Build your profile</h4>
                <p>Select what services you want to offer and where.</p>
            </div>
            <div class="col-md-">
                <h4>3. Verify your eligibility to task</h4>
                <p>Confirm your identity and submit business verifications, as required.</p>
            </div>
        </div>
        <div class="row mt-5 reg-response-row-two">
            <div class="col-md- col-col">
                <h4>4. Pay registration fee</h4>
                <p>In applicable cities, we charge #950 registration fee that help us to provide <br> the best services to you.</p>
            </div>
            <div class="col-md-">
                <h4>5. Set your schedule and <br> work area</h4>
                <p>Set your weekly availability and opt in to receive same-day jobs.</p>
            </div>
            <div class="col-md-">
                <h4>6. Start getting jobs</h4>
                <p>Grow your business on your own terms.</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <div class="row">
            <div class="col-md-4 signup-testimony-div">
                <span><i class="fa fa-quote-left"></i></span>
                <p class="">I love Taskvendor! I was able to get <br> out of dept, tackle bills, provide for <br> my family and still have enough <br> to save for the future goals.</p>
                <span>Mobolanle Docas, <span>Lagos.</span></span>
            </div>
            <div class="col-md-8"><img src="img/main-slider-2-2.jpg" alt="" width="100%" height="70%"></div>
        </div>
    </div>
    <div class="question-ask">
        <h3 class="text-center">Your questions, answered</h3>
        <div class="question-ask-div mt-5">
            <div class="question-div-one">
                <ul>
                    <li>What's required to become a Tasker?</li>
                    <li>How do I get job?</li>
                    <li>Where does Taskvendor operate?</li>
                    <li>How long does it take for my registration to be processed?</li>
                </ul>
            </div>
            <div class="question-div-two">
                <ul>
                    <li>Do I need experience to task?</li>
                    <li>How do I get paid?</li>
                    <li>What category can I take on Taskvendor?</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="last-wrapper text-center mt-5">
        <h3 class="">Ready to make money your way?</h3>
        <a href="#signup_div">Get Started</a>
        <div class=""><a href="#"><img src="img/android app icon.png" alt="" width="10%"></a> <span><a href="#"><img src="img/apple icon.png" alt="" width="10%"></a></span></div>
    </div>
</main>

<!-- modal -->
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
<!-- modal end -->

<?php require "inc/footer.php";?>