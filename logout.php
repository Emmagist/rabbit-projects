<?php
include  "config/init.php";

unset($_SESSION["csrf"], $_SESSION["email"]);
session_destroy();
header("Location: index.php");