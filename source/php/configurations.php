<?php
namespace Symphony;

final class Configurations{
  ////////// Methods | APIs
  public static function init(){
    // Opening the file
    self::$yaml = yaml_parse_file($_SERVER['DOCUMENT_ROOT']."/yaml/configurations.yaml");

    // Re-assign configuration values once YAML file opened successfully
    if(self::$yaml != null) self::update();

  }

  // Update values
  // Fall back to defaults if values are falsy
  private static function update(){
    self::$path = self::$yaml["path"] ?? null;
    self::$database = self::$yaml["database"] ?? null;
    self::$URL = self::$yaml["URL"] ?? null;
    self::$HTML = self::$yaml["HTML"] ?? null;

  }

  ///// Getters
  public static function path(){return self::$path;}
  public static function database(){return self::$database;}
  public static function URL(){return self::$URL;}
  public static function HTML(){return self::$HTML;}
  public static function raw(){return self::$yaml;}

  ////////// Variables
  private static $yaml = null;
  private static $path;
  private static $database;
  private static $URL;
  private static $HTML;

}

// Make Life Easier
class_alias("\Symphony\Configurations", "\Symphony\Config");
class_alias("\Symphony\Configurations", "\Symphony\Conf");

?>
