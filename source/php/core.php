<?php
namespace Symphony;

require_once 'configurations.php';
require_once 'database.php';
require_once 'HTML.php';
require_once 'router.php';

final class Core{
  ////////// Methods | APIs
  public static function start(){
    Configurations::init();

    Database::connect(
      Conf::database()["host"],
      Conf::database()["user"],
      Conf::database()["password"],
      Conf::database()["name"]
    );

    Router::start();

    self::makeResponse();

  }

  private static function makeResponse(){
    // Response On Request Method = GET
    if($_SERVER["REQUEST_METHOD"] == "GET") echo HTML::getSource();

    // Response On Request Method = POST
    if($_SERVER["REQUEST_METHOD"] == "POST") echo self::$responseData;

  }

  ///// Setters
  public static function setResponseData($data){
    self::$responseData = $data ?? null;

  }

  ///// Getters



  ////////// Variables
  private static $responseData = null;

}

?>
