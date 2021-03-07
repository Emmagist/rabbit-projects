<?php 
  require "head.php";
  // require "../libs/process.php";
  require "libs/process.php";
  // require "libs/user.php";
  // $token = $_SESSION['csrf'];
 ?>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- SignupModal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Your Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Create an account to get started. Then we'll text you a link to download the Tasker app to complete your registration.</p>
        <p>Standard call, messaging, or data rates apply</p> 
        <form action="" method="post">
          <div><input type="text" placeholder="Email" class="form-control"></div>
          <div>
            <input type="text" placeholder="First Name" class="form-control">
            <input type="text" placeholder="Last Name" class="form-control">
          </div>
          <div class="">
            <input type="text" placeholder="Mobile Phone" class="form-control">
            <input type="text" placeholder="Create a password" class="form-control">
            <input type="text" placeholder="Address" class="form-control">
          </div>
          <div class=""><button type="submit" class="btn">Create Account</button></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->


<!-- SignupModal -->
<div class="modal fade" id="userDashboardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div>
            <?php foreach($usr->getAllUsers($token) as $key) : ?>
            <input type="text" value="<?=$key['first_name'];?>" class="form-control p-3">
            <input type="text" value="<?=$key['last_name'];?>" class="form-control mt-4 p-3">
            <input type="text" value="<?=$key['email'];?>" class="form-control mt-4 p-3">
            <input type="text" value="<?=$key['address'];?>" class="form-control mt-4 p-3">
            <input type="text" value="<?=$key['task'];?>" class="form-control mt-4 p-3">
            <?php endforeach; ?>
          </div>
          <div class=""><button type="submit" class="btn mt-4 p-2">Edit Account</button></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Account Deactivation -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
        <form action="" method="post">
          <?php require "inc/session_message.php";?>
          <input type="hidden" name="user_token" class="form-control" value="<?=$token?>">
          <div class=""><button type="submit" class="btn btn-danger mr-3" name="deactivate_button">Deactivate</button><button type="button" class="btn btn-white ml-5" data-dismiss="modal">Cancel</button></div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>