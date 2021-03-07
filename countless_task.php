<?php 
    require "libs/user.php";
    // $session->checkSession();
    // $token = $_SESSION['csrf'];

    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tasker</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" type="image/png" href="img/tag icon.png">
    </head>
    <body>
        <main>
            <div class="wrapper">
                <hr><p class="text-center">Tell us about your task, we use these details to show Taskers in your area who fit your needs.</p><hr>
                
            </div>
            <div class="details-wrapper container">
                <h5>Contactless Prescription Pick-up & Delivery</h5>
                <div class="expect mt-5">
                    <div class=""><img src="img/download.jpg" alt="" width="70%" height="100%"></div>
                    <div class="">
                        <h6>What to Expect</h6>
                        <p>Whether it's a single stop or many, trusted Taskers can help get what you need - safely and quickly.</p>
                          <button type="button" class="popover-btn" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Whether it's a single stop or many, trusted Taskers can help get what you need - safely and quickly.Whether it's a single stop or many, trusted Taskers can help get what you need - safely and quickly.Whether it's a single stop or many, trusted Taskers can help get what you need - safely and quickly.Whether it's a single stop or many, trusted Taskers can help get what you need - safely and quickly.">
                            See what to expect
                          </button>
                    </div>
                </div>
                <div class="address-input mt-5">
                    <h6>START ADDRESS</h6>
                    <form action="" method="post">
                        <div class="">
                            <input type="search" placeholder="Enter street address" class="form-control mt-3 input-unit" required name="address">
                            <input type="search" placeholder="Unit or Apt #" class="form-control input-unit-two mt-3" name="">
                        </div>
                    </form>
                    <button type="submit" class="btn mt-5">Continue</button>
                </div>
                <div class="adress-optional mt-5">
                    <input type="text" class="form-control" placeholder="END ADDRESS (OPTIONAL)">
                    <input type="text" class="form-control mt-2" placeholder="TASKS OPTIONS">
                    <textarea name="" id="" class="form-control mt-2" placeholder="TELL US THE DETAILS OF YOUR TASK"></textarea>
                </div>
                <div class="address-input mt-5">
                    <h6>END ADDRESS (OPTIONAL)</h6>
                    <div class="">
                        <input type="search" placeholder="Enter street address" class="form-control mt-3 input-unit" required>
                        <input type="search" placeholder="Unit or Apt #" class="form-control input-unit-two mt-3">
                    </div>
                    <button type="submit" class="btn mt-5">Continue</button>
                </div>
                <div class="task-option mt-5">
                    <p>TASK OPTION</p>
                    <h6>How big is your task?</h6>
                    <form action="" method="post">
                        <div class="task-option-div">
                            <div class="task-option-div-one"><input type="radio" class="mr-1"><span>Small-Est. 1hr</span></div>
                            <div class="task-option-div-two"><input type="radio" class="mr-1"><span>Medium-Est. 2-3hrs</span></div>
                            <div class=""><input type="radio" class="mr-1"><span>Large-Est. 4hrs+</span></div>
                        </div>
                        <div class="">
                            <h6  class="mt-3">Vehicle Requirements</h6>
                            <div class=""><input type="radio" class="mr-1"><span>Not needed for task</span></div>
                            <div class=""><input type="radio" class="mr-1"><span>Task requires a car</span></div>
                            <div class=""><input type="radio" class="mr-1"><span>Task requires a truck</span></div>
                        </div>
                        <button type="submit" class="btn task-option-button mt-4" name="">Continue</button>
                    </form>
                </div>
                <div class="full-details-task mt-5">
                    <h6>TELL US THE DETAILS OF YOUR TASK</h6>
                    <P>Start the conversation and tell your Tasker what you need done. This help us show you qualified and available Taskers for the job. <br> Don't worry, you can edit this later</P>
                    <form action="" method="post">
                        <textarea name="" id="" placeholder="Provider the summary of what you need done for your Tasker. Be sure to include size of your space, any equipment/tools need, and how to get in." class="form-control"></textarea>
                        <p>If you need two or more Taskers, please post additional tasks for each Tasker needed</p>
                        <a href="#" class="">See Taskers & Prices</a>
                    </form>
                </div> <hr class="mb-4">
                <a href="#" class="footer-help help-adjust"><i class="fa fa-question-circle"></i> Help</a>               
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>