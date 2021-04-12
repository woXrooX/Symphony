<?php
  class HTML{
    private static $title;
    private static $main;

/////////////////////////// html
// start
    private static function html_start(){
      // de-DE
      echo "
<!DOCTYPE html>
<html lang='en' dir='ltr'>
      ";
    }

// end
    private static function html_end(){
      echo "
</html>
      ";
    }

/////////////////////////// head
    private static function head(){
      echo "
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='initial-scale=1.0, width=device-width'>

    <link rel='stylesheet' href='../css/master.css'>

    <script type='module' src='../js/main.js'></script>

    <title>".self::$title."</title>
  </head>
      ";
    }

/////////////////////////// body
// start
    private static function body_start(){
      echo "
  <body>
      ";
    }
// end
    private static function body_end(){
      echo "
  </body>
      ";
    }

/////////////////////////// header
    private static function header(){
      echo "
    <header>Header</header>
      ";
    }
/////////////////////////// main
    private static function main(){
      echo "
    <main>".self::$main."</main>
      ";
    }

/////////////////////////// footer
    private static function footer(){
      echo "
    <footer>Footer</footer>
      ";
    }

///////////////////////// run
    public static function run($title, $main){
      self::$title = $title;
      self::$main = $main;

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
