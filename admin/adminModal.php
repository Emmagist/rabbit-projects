<?php require_once "libs/init.php";?>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

 <!-- addCategoryModal  -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
            <form action="" method="post">
                <?php require "inc/error_message.php";?>
                <?php require "inc/session_message.php";?>
                <div class="form-group"><input type="text" placeholder="Enter Category" name="addCategory" class="form-control"></div>
                <div class=""><button type="submit" class="btn btn-success mr-3" name="addCategoryButton">Add Category</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
            </form>
      </div>
    </div>
  </div>
</div>
