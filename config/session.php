<?php

class Session{
  //setting a session
  //starting a session
  public static function init(){
    session_start();
  }
  //set the key
  public static function set($key, $val){
    $_SESSION[$key] = $val;
  }
  //get the key if is set
  public static function get($key){
      if (isset($_SESSION[$key])) {
          return $_SESSION[$key];
      } else {
          return false;
      }
  }
  //to check the session
  public static function checkAdminSession(){
    self::init();
    if (self::get("adminLogin") == false) {
      self::destroy();
      header("Location: login.php");
    }
  }
//   public static function checkAdminLogin(){
//     self::init();
//     if (self::get("adminLogin") == true) {
//      self::destroy();
//      header("Location: index.php");
//     }
//   }
  //to check the session
  public static function checkSession(){
    if (self::get("login") == false) {
      self::destroy();
      header("Location: login.php");
    }
  }
  //to check the user session
//   public static function checkLogin(){
//     if (self::get("login") == true) {
//      self::destroy();
//      header("Location: exam.php");
//     }
//   }

  public static function checkVerify(){
    // self::init();
    if (self::get("verify") == "verified") {
    self::destroy();
    header("Location: dashboard.php");
    }else {
        header("Location: user_verified.php");
    }
 }
  //session destroy
  public function destroy(){
    session_destroy();
    session_unset(); 
  }


}

?>
