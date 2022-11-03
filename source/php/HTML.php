<?php
namespace Symphony;

final class HTML{
  //////////////// Defaults
  private static $title = null;
  private static $header = "Header";
  private static $main = "Main";
  private static $footer = "Footer";


  //////////////// Setters
  public static function setTitle($title = null){self::$title = $title;}
  public static function setHeader($header = "Header"){self::$header = $header;}
  public static function setMain($main = "Main"){self::$main = $main;}
  public static function setFooter($footer = "Main"){self::$footer = $footer;}

  private static function html_start(){echo "<!DOCTYPE html><html lang='".Configurations::HTML()["lang"]."' dir='ltr'>";}

  private static function html_end(){echo "</html>";}

  private static function head(){
    echo "
      <head>
        <meta charset='".Configurations::HTML()["charset"]."'>
        <meta name='viewport' content='initial-scale=1.0, width=device-width'>

        <link rel='stylesheet' href='".Configurations::path()["css"]."common.css'>
        <link rel='stylesheet' href='".Configurations::path()["css"]."master.css'>
        <link rel='stylesheet' href='".Configurations::path()["css"]."styles.css'>

        <script type='module' src='".Configurations::path()["js"]."main.js'></script>

        <title>".(self::$title == null ? Configurations::HTML()["title"] : self::$title)."</title>
      </head>
    ";

  }

  private static function body_start(){echo "<body>";}

  private static function body_end(){echo "</body>";}

  private static function header(){echo "<header>".self::$header."</header>";}

  private static function main(){echo "<main>".self::$main."</main>";}

  private static function footer(){echo "<footer>".self::$footer."</footer>";}

  public static function build(){
    self::html_start();
      self::head();
      self::body_start();
        self::header();
        self::main();
        self::footer();
      self::body_end();
    self::html_end();

  }

}

?>
