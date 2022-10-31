<?php
class Database{
  ////////// Methods | APIs
  public static function connect($host, $user, $password, $databaseName){
    $dsn = "mysql:host=".$host."; dbname=".$databaseName;
    self::$pdo = new PDO($dsn, $user, $password);

    // Set Default Fetch Type To Array
    // For Object -> FETCH_OBJ
    // For Array -> FETCH_ASSOC
    self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  }

  // Raw Execute
  public static function execute($query = "", $placeholder = []){
    // Check If Query Is Not Empty Or Null
    if($query == "" || $query == null) return false;
    $success = false;

    try{
      self::$stmt = self::$pdo->prepare($query);
      self::$pdo->beginTransaction();
      $success = self::$stmt->execute($placeholder);
      self::$lastID = self::$pdo->lastInsertId();
      self::$pdo->commit();

    }catch(Exception $error){
      echo "<hr>".$error->getMessage()."<hr>";
      return false;

    }

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

  // Last ID
  public static function lastID(){
    return self::$lastID;
  }

  // Error Info
  public static function errorInfo(){
    return self::$stmt->errorInfo();
  }

  // Clear -> Sets Null
  public static function clear(){
    self::$stmt = null;
  }






  ////////// Variables
  private static $pdo = null;
  private static $stmt = null;
  private static $lastID = null;



}

?>
