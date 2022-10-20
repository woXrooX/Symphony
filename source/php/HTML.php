<?php
// Dynamic DOM Generator

final class HTML{
  private static $title = "Symphony PHP";
  private static $main = "Main";

  public static function setTitle($title = "Symphony PHP"){self::$title = $title;}

  public static function setMain($main = "Main"){self::$main = $main;}

  private static function html_start(){
    echo "
      <!DOCTYPE html>
      <html lang='en' dir='ltr'>
    ";
  }

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

  private static function header(){echo "<header>Header</header>";}

  private static function main(){echo "<main>".self::$main."</main>";}

  private static function footer(){echo "<footer>Footer</footer>";}

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
