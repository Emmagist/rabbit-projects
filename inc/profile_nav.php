<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];

require_once "libs/init.php";

if (isset($_GET['token'])) {
  $token = $_GET['token'];
}else{
  header("Location: login.php");
}
$users = $usr->getAllUsers($token);

foreach ($users as $user) {
  // echo $user['email'];exit;
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="profile-nav">
            <a class="navbar-brand text-secondary" href="index.php?token=<?=$token?>">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse profile-nav-div" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <?php if ($user['role'] == 3) : ?>
                  <li class="nav-item pr-4 <?php if($first_part==""){echo "active";}else{echo "noactive";} ?>">
                    <a class="nav-link text-white" href="countless_task.php?token=<?=$token?>" id="profile-nav-a">Contactless Tasks & Delivery</a>
                  </li>
                  <li class="nav-item pr-4 <?php if($first_part==""){echo "active";}else{echo "noactive";} ?>">
                    <a class="nav-link nav-li text-white" id="profile-nav-a" href="#">Get A Gift</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nav-li text-white" id="profile-nav-a" href="#">Book A Task</a>
                  </li>
                  <li class="nav-item pr-4 <?php if($first_part==""){echo "active";}else{echo "noactive";} ?>">
                      <a class="nav-link nav-li text-white" id="profile-nav-a" href="#">My Tasks</a>
                  </li>
                  <li class="nav-item <?php if($first_part==""){echo "active";}else{echo "noactive";} ?>">
                      <a class="nav-link nav-li active text-white" id="profile-nav-a" href="#">Account</a>
                  </li>
                <?php elseif ($user['role'] == 2) : ?>
                  <li class="nav-item">
                      <a class="nav-link nav-li text-white" id="profile-nav-a" href="#">Post A Task</a>
                  </li>
                  <li class="nav-item pr-4 <?php if($first_part==""){echo "active";}else{echo "noactive";} ?>">
                      <a class="nav-link nav-li text-white" id="profile-nav-a" href="#">My Tasks</a>
                  </li>
                  <li class="nav-item <?php if($first_part==""){echo "active";}else{echo "noactive";} ?>">
                      <a class="nav-link nav-li active text-white" id="profile-nav-a" href="#">Account</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
        </nav>