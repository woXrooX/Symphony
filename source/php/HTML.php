<?php
namespace Symphony;

final class HTML{
  ////////// Methods | APIs
  ///// Setters
  public static function setTitle($title){self::$title = $title;}
  public static function setHeader($header){self::$header = $header;}
  public static function setMain($main){self::$main = $main;}
  public static function setFooter($footer){self::$footer = $footer;}

  public static function addJavaScript($name = "main"){
    array_push(self::$javaScripts, $name);

  }

  ///// Getters
  public static function getSource(){
    self::build();

    return self::$source;

  }


  ///// Methods
  private static function html_start(){return "<!DOCTYPE html><html lang='".Configurations::HTML()["lang"]."' dir='ltr'>";}

  private static function html_end(){return "</html>";}

  private static function head(){

    return "
      <head>
        <meta charset='".Configurations::HTML()["charset"]."'>
        <meta name='viewport' content='initial-scale=1.0, width=device-width'>

        <link rel='stylesheet' href='".Configurations::path()["css"]."common.css'>
        <link rel='stylesheet' href='".Configurations::path()["css"]."master.css'>
        <link rel='stylesheet' href='".Configurations::path()["css"]."styles.css'>

        ".self::generateJavaScriptElements()."

        <title>".(self::$title == null ? Configurations::HTML()["title"] : self::$title)."</title>
      </head>
    ";

  }

  private static function generateJavaScriptElements(){
    $elements = "";
    foreach(self::$javaScripts as $javaScript){
      $elements .= "<script type='module' src='".Configurations::path()["js"].$javaScript.".js'></script>";

    }

    return $elements;
  }

  private static function body_start(){return "<body>";}

  private static function body_end(){return "</body>";}

  private static function header(){return "<header>".self::$header."</header>";}

  private static function main(){return "<main>".self::$main."</main>";}

  private static function footer(){return "<footer>".self::$footer."</footer>";}

  private static function build(){
    self::$source =
      self::html_start().
        self::head().
        self::body_start().
          self::header().
          self::main().
          self::footer().
        self::body_end().
      self::html_end();
  }


  ////////// Variables
  private static $title = null;
  private static $javaScripts = array();
  private static $header = "Header";
  private static $main = "Main";
  private static $footer = "Footer";
  private static $source = null;

}

?>
