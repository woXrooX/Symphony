<?php
include_once 'configurations.php';
include_once 'router.php';
include_once 'HTML.php';

class Core{
  public static function start(){
    Configurations::init();
    Router::start();
    HTML::build();

  }

}

?>
