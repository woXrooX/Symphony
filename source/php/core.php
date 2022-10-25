<?php
include_once 'configurations.php';
include_once 'database.php';
include_once 'router.php';
include_once 'HTML.php';

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
