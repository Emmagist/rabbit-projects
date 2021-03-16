<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<?php
    require_once "libs/init.php";
    if (isset($_GET['token']) || isset($_GET['tq'])) {
      $token = $_GET['token'];
    }

    $disabled = $admin->disabledUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
 

</head>

<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="../index.php?token=<?=$token?>">pro sidebar</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">Jhon
            <strong>Smith</strong>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Notification</span>
              <span class="badge badge-pill badge-warning">New</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li id="">
                  <a href="#">New Users
                    <span class="badge badge-pill user-status"><i class="fa fa-circle"></i></span>
                  </a>
                </li>
                <li>
                  <a href="#">New Subscribers</a>
                </li>
                <li>
                  <a href="#" id="userDisabled">Users Disabled
                    <?php
                        if ($disabled ++) {
                            echo "<span class='badge badge-pill user-status'><i class='fa fa-circle' id='disabledSpan'></i></span>";
                        }
                    ?>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Category</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#" id="viewCategory">View Category</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>Users</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#" id="viewUser">View Users</a>
                </li>
                <li>
                  <a href="#" id="viewTasker">View Taskers</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Charts</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Pie chart</a>
                </li>
                <li>
                  <a href="#">Line chart</a>
                </li>
                <li>
                  <a href="#">Bar chart</a>
                </li>
                <li>
                  <a href="#">Histogram</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Maps</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Google maps</a>
                </li>
                <li>
                  <a href="#">Open street map</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Examples</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="#">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
        <!-- disabledUsersTable -->
      <div class="border p-4" id="disabledUsersTable">
        <h2>Disabled Users</h2>
        <table class="table">
            <thead class="table-head">
                <tr>
                    <td><strong>Email</strong></td>
                    <td><strong>First name</strong></td>
                    <td><strong>Last Name</strong></td>
                    <td><strong>State</strong></td>
                    <td><strong>Phone Number</strong></td>
                    <td><strong>Picture</strong></td>
                </tr>
            </thead>
            <tbody class="table-body">
                <?php 
                    if ($disabled) :
                    foreach ($disabled as $disable) : 
                ?>
                <tr>
                    <td><?=$disable['email']?></td>
                    <td><?=$disable['first_name']?></td>
                    <td><?=$disable['last_name']?></td>
                    <td><?=$disable['state']?></td>
                    <td><?=$disable['phone_num']?></td>
                    <td><?=$disable['image']?></td>
                </tr>
                <?php endforeach;endif; ?>
            </tbody>
        </table>
      </div>

      <!-- viewCategoryTable -->
      <div class="viewCategory d-flex" id="viewCategoryTable">
          <div class="col-md-2"><button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add Category</button></div>
          <div class="col-md-5 border p-4">
              <h3 class="mb-3">Category</h3>
              <table class="table">
                  <thead class="table-head">
                      <tr class="table-row">
                          <td class=""><strong>Category</strong></td>
                          <td class="ml-5"><strong>Edit</strong></td>
                      </tr>
                  </thead>
                  <tbody class="table-body">
                        <?php if ($admin->getCategory()) :
                          foreach ($admin->getCategory() as $cat) : ?>
                            <tr class="table-row">
                                <td class="table-data"><?=$cat['category']?></td>
                                <td class="table-data"><button class="btn btn-success btn-flat btn-sm mr-3">Edit</button><button class="btn btn-danger btn-flat btn-sm">Delete</button></td>
                            </tr>
                        <?php endforeach; endif;?>
                  </tbody>
              </table>
          </div>
      </div>
      
      <!-- viewUsersTable -->
      <div class="border p-4" id="viewUsersTable">
            <h2>Users</h2>
            <table class="table">
                <thead class="table-head">
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><strong>First name</strong></td>
                        <td><strong>Last Name</strong></td>
                        <td><strong>State</strong></td>
                        <td><strong>Phone Number</strong></td>
                        <td><strong>Picture</strong></td>
                        <td><strong>Address</strong></td>
                        <td><strong>Verify</strong></td>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php 
                        if ($admin->getUsers()) :
                        foreach ($admin->getUsers() as $user) : 
                    ?>
                    <tr>
                        <td><?=$user['email']?></td>
                        <td><?=$user['first_name']?></td>
                        <td><?=$user['last_name']?></td>
                        <td><?=$user['state']?></td>
                        <td><?=$user['phone_num']?></td>
                        <td><img src="<?=$user['image']?>" alt="" width="15%"></td>
                        <td><?=$user['address']?></td>
                        <td><?=$user['verify']?></td>
                    </tr>
                    <?php endforeach;endif; ?>
                </tbody>
            </table>
      </div>

      <!-- viewTaskersTable -->
      <div class="border p-4" id="viewTaskersTable">
            <h2>Users</h2>
            <table class="table">
                <thead class="table-head">
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><strong>First name</strong></td>
                        <td><strong>Last Name</strong></td>
                        <td><strong>State</strong></td>
                        <td><strong>Phone Number</strong></td>
                        <td><strong>Picture</strong></td>
                        <td><strong>Address</strong></td>
                        <td><strong>Verify</strong></td>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php 
                        if ($admin->getTasker()) :
                        foreach ($admin->getTasker() as $user) : 
                    ?>
                    <tr>
                        <td><?=$user['email']?></td>
                        <td><?=$user['first_name']?></td>
                        <td><?=$user['last_name']?></td>
                        <td><?=$user['state']?></td>
                        <td><?=$user['phone_num']?></td>
                        <td><img src="<?=$user['image']?>" alt="" width="15%"></td>
                        <td><?=$user['address']?></td>
                        <td><?=$user['verify']?></td>
                    </tr>
                    <?php endforeach;endif; ?>
                </tbody>
            </table>
      </div>
    </div>
  </main>
  <!-- page-content" -->
</div>
<?php require_once "adminModal.php"; ?>
<!-- page-wrapper -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    
</body>

</html>