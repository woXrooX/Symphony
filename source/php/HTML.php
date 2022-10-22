<?php
final class HTML{
  //////////////// Defaults
  private static $title = "Symphony PHP";
  private static $header = "Header";
  private static $main = "Main";
  private static $footer = "Footer";


  //////////////// Setters
  public static function setTitle($title = "Symphony PHP"){self::$title = $title;}
  public static function setHeader($header = "Header"){self::$header = $header;}
  public static function setMain($main = "Main"){self::$main = $main;}
  public static function setFooter($footer = "Main"){self::$footer = $footer;}

  private static function html_start(){echo "<!DOCTYPE html><html lang='en' dir='ltr'>";}

  private static function html_end(){echo "</html>";}

  private static function head(){
    echo "
      <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='initial-scale=1.0, width=device-width'>

        <link rel='stylesheet' href='/css/common.css'>
        <link rel='stylesheet' href='/css/master.css'>
        <link rel='stylesheet' href='/css/styles.css'>

        <script type='module' src='/js/main.js'></script>
        <title>".self::$title."</title>
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
