<?php
  include_once 'php/HTML.php';

  ////////// home
  if($_SERVER['REQUEST_URI'] == "/" || $_SERVER['REQUEST_URI'] == "/home"){
    $main = "Home";
    HTML::run("Home", $main);

  ////////// privacyPolicy
  }elseif($_SERVER['REQUEST_URI'] == "privacyPolicy"){
    $main = "Home";
    HTML::run("Home", $main);

  ////////// redirect home
  }else{
    header("location: https://www.site.com/home");
    exit();
  }
?>
