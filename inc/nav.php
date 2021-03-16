<?php 

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];

require_once "libs/init.php";

if (isset($_GET['token'])) {
  $token = $_GET['token'];
}
$users = $usr->getAllUsers($token);
foreach ($users as $user) {
  // echo $user['email'];exit;
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="main-nav">
            <a class="navbar-brand text-secondary <?php $first_part == "index.php" ? "active" : "noactive" ?>" href="index.php?token=<?=$token?>">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse nav-div" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item pr-4 <?php $first_part=="" ? "active" : "noactive"?>">
                  <a class="nav-link text-white" id="nav-a" href="countless_task.php">Contactless Tasks & Delivery</a>
                </li>
                <li class="nav-item pr-4 <?php $first_part=="" ? "active" : "noactive"?>">
                  <a class="nav-link text-white nav-li" id="nav-a" href="#">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav-li" id="nav-a" href="#">Services</a>
                </li>
                <?php $login = Session::get("login"); if ($login == true) : ?>
                  <li class="nav-item pr-4 <?php $first_part=="signup" ? "active" : "noactive"?>">
                  <a class="nav-link text-white nav-li" id="nav-a" href="logout.php">Logout</a>
                  </li>
                  <li class="nav-item pr-4 <?php $first_part=="signup" ? "active" : "noactive"?>">
                  <?php if ($user['role'] == 1) : ?>
                    <a class="nav-link text-white nav-li" id="nav-a" href="admin/index.php?token=<?=$token?>">My Dashboard</a>
                  <?php elseif ($user['role'] == 2) : ?>
                    <a class="nav-link text-white nav-li" id="nav-a" href="tasker_dashboard.php?token=<?=$token?>">My Dashboard</a>
                  <?php elseif ($user['role'] == 3) : ?>
                    <a class="nav-link text-white nav-li" id="nav-a" href="user_dashboard.php?token=<?=$token?>">My Dashboard</a>
                  <?php endif; ?>
                  </li>
                <?php else : ?>
                  <li class="nav-item pr-4 <?php $first_part=="signup" ? "active" : "noactive"?>">
                    <a class="nav-link text-white nav-li" id="nav-a" href="signup.php">Signup/Login</a>
                  </li>
                  <li class="nav-item <?php $first_part=="" ? "active" : "noactive"?>">
                    <a class="nav-link text-white nav-li radius bg-transparent" href="#" id="radius">Become a Tasker</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
        </nav>