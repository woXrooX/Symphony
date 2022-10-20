<?php
class Router{
  public static function start(){
    self::detectURL();
  }

  private static function detectURL(){
    // ON URL == / Go Home
    if($_SERVER['REQUEST_URI'] == "/"){
      require_once $_SERVER['DOCUMENT_ROOT'].'/pages/home.php';
      return;

    }

    // Check If File Exists For Specific URL
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/pages'.$_SERVER['REQUEST_URI'].'.php')){
      require_once $_SERVER['DOCUMENT_ROOT'].'/pages'.$_SERVER['REQUEST_URI'].'.php';
      return;

    }

    // 404 | Back To Home
    header("location: http://".$_SERVER['HTTP_HOST']."/home");

  }

}

?>
