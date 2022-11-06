<?php
// Router's role is finding correct .php files in Symphony/source/pages folder
// And sending their data to core

namespace Symphony;

final class Router{
  public static function start(){
    self::detectURL();
  }

  private static function detectURL(){
    // Output Buffering ON
    ob_start();

    // ON URL == / Go Home
    if($_SERVER['REQUEST_URI'] == "/") require_once $_SERVER['DOCUMENT_ROOT'].'/pages/home.php';

    // Check If File Exists For Specific URL
    elseif(file_exists($_SERVER['DOCUMENT_ROOT'].'/pages'.$_SERVER['REQUEST_URI'].'.php')) require_once $_SERVER['DOCUMENT_ROOT'].'/pages'.$_SERVER['REQUEST_URI'].'.php';

    // 404 | Back To Home
    else header("location: http://".$_SERVER['HTTP_HOST']."/home");

    // On Request Method == GET
    if(function_exists("onGET") && $_SERVER["REQUEST_METHOD"] == "GET") HTML::setMain(onGET());

    // On Request Method == POST
    elseif(function_exists("onPOST") && $_SERVER["REQUEST_METHOD"] == "POST") Core::setResponseData(onPOST());

    // Output Buffering OFF + Erase Buffered Data
    ob_end_clean();

  }

}

?>
