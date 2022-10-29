<?php
require_once 'configurations.php';
require_once 'database.php';
require_once 'router.php';
require_once 'HTML.php';

class Core{
  public static function start(){
    Configurations::init();

    Database::connect(
      Conf::database()["host"],
      Conf::database()["user"],
      Conf::database()["password"],
      Conf::database()["name"]
    );

    Router::start();
    HTML::build();

  }

}

?>
