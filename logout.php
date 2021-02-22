<?php
include  "config/init.php";

unset($_SESSION["user_token"], $_SESSION["email"]);
session_destroy();
header("Location: index.php");