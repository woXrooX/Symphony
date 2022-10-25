<?php
class Database{
  ////////// Methods | APIs
  public static function connect($host, $user, $password, $databaseName){
    $dsn = "mysql:host=".$host."; dbname=".$databaseName;
    self::$pdo = new PDO($dsn, $user, $password);

    // Set Default Fetch Type To Array
    // For Object -> FETCH_OBJ
    self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  }

  // Raw Execute
  public static function execute($query = "", $placeholder = []){
    self::$stmt = self::$pdo->prepare($query);
    $success = self::$stmt->execute($placeholder);

    // Error Check Goes Here

    return $success;

  }

  // Fetch All
  public static function fetchAll(){
    // Error Check Goes Here
    return self::$stmt->fetchAll();

  }

  // Fetch One
  public static function fetchOne(){
    // Error Check Goes Here
    return self::$stmt->fetch();

  }

  // Row Count
  public static function rowCount(){
    // Error Check Goes Here
    return self::$stmt->rowCount();
    
  }


  ////////// Variables
  private static $pdo = null;
  private static $stmt = null;



}

?>
