<?php
include_once 'router.php';
include_once 'HTML.php';

class Core{
  public static function start(){
    Router::start();
    HTML::build();
    
  }

}

?>
