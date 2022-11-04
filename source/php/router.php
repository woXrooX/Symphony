<?php
namespace Symphony;

final class Router{
  public static function start(){
    self::detectURL();
  }

  private static function detectURL(){
    // Output Buffering ON
    ob_start();

    // ON URL == / Go Home
    if($_SERVER['REQUEST_URI'] == "/"){
      require_once $_SERVER['DOCUMENT_ROOT'].'/pages/home.php';

      // Output Buffering OFF + Erase Buffered Data
      ob_end_clean();


      // On Request Method == GET
      if(function_exists("onGET") && $_SERVER["REQUEST_METHOD"] == "GET") HTML::setMain(onGET());

      // On Request Method == POST
      if(function_exists("onPOST") && $_SERVER["REQUEST_METHOD"] == "POST") return onPOST();

      return;

    }

    // Check If File Exists For Specific URL
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/pages'.$_SERVER['REQUEST_URI'].'.php')){
      require_once $_SERVER['DOCUMENT_ROOT'].'/pages'.$_SERVER['REQUEST_URI'].'.php';

      // Output Buffering OFF + Erase Buffered Data
      ob_end_clean();

      // On Request Method == GET
      if(function_exists("onGET") && $_SERVER["REQUEST_METHOD"] == "GET") HTML::setMain(onGET());

      // On Request Method == POST
      if(function_exists("onPOST") && $_SERVER["REQUEST_METHOD"] == "POST") return onPOST();

      return;

    }

    // 404 | Back To Home
    header("location: http://".$_SERVER['HTTP_HOST']."/home");

  }

}

?>
