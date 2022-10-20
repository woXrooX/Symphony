<?php
class Router{
  public static function start(){
    self::detectURL();
  }

  private static function detectURL(){
    // URL = /
    if($_SERVER['REQUEST_URI'] == "/"){
      include_once 'pages/home.php';
      return;

    }

    // Check If File Exists For Specific URL
    if(file_exists('php/pages'.$_SERVER['REQUEST_URI'].'.php')){
      include_once 'pages'.$_SERVER['REQUEST_URI'].'.php';
      return;

    }

    // 404 | Back To Home
    header("location: http://".$_SERVER['HTTP_HOST']."/home");

  }

}

?>
