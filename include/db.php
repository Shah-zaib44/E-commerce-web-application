<?php
class db{
private static $instance =null;
private function __construct(){}
public static function getInstance(){
    if (self::$instance == null)
    {
      self::$instance = new db();
    }
 
    return self::$instance;
    
}
public function getConnection(){
    $serverName = "DESKTOP-QD0QT2L\SQLEXPRESS";
$connectionInfo=array("Database"=>"myshop");
$conn=sqlsrv_connect($serverName,$connectionInfo);
return $conn;
}
}
$object=db::getInstance();
$conn=$object->getConnection();


?>