<?php
class Router{
  public static function start(){
    self::detectURL();
  }

  private static function detectURL(){
    // URL = /
    if($_SERVER['REQUEST_URI'] == "/"){
      include_once 'pages/products.php';
      return;

    }

    // Check If File Exists For Specific URL
    if(file_exists('php/pages'.$_SERVER['REQUEST_URI'].'.php')){
      include_once 'pages'.$_SERVER['REQUEST_URI'].'.php';
      return;

    }

    // 404 | Back To Products
    header("location: http://".$_SERVER['HTTP_HOST']."/products");

  }

}

?>
