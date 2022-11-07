<?php
namespace Symphony;

require_once 'configurations.php';
require_once 'database.php';
require_once 'HTML.php';
require_once 'router.php';

final class Core{
  ////////// Methods | APIs
  public static function start(){
    self::settings();

    Configurations::init();

    Database::connect(
      Conf::database()["host"],
      Conf::database()["user"],
      Conf::database()["password"],
      Conf::database()["name"]
    );

    Router::start();

    // Should Be Last To Call
    self::makeResponse();

  }

  public static function enableDevMode(){
    self::$isDevModeEnabled = true;

    ini_set('display_errors', '1');

  }

  ///// Setters
  public static function setResponseData($data){
    self::$responseData = $data ?? null;

  }

  ///// Getters
  public static function isDevModeEnabled(){
    return self::$isDevModeEnabled;

  }

  ///// Methods
  private static function makeResponse(){
    // Response On Request Method = GET
    if($_SERVER["REQUEST_METHOD"] == "GET") echo HTML::getSource();

    // Response On Request Method = POST
    if($_SERVER["REQUEST_METHOD"] == "POST") echo self::$responseData;

  }

  private static function settings(){
    // By Default Doesn't Show Errors
    if(self::$isDevModeEnabled === false) ini_set('display_errors', '0');

  }


  ////////// Variables
  private static $responseData = null;
  private static $isDevModeEnabled = false;

}

?>
