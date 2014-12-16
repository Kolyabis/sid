<?php
session_start(); /* Запускаем сессию */ 
ini_set('display_errors', 1);
define('PS', PATH_SEPARATOR);
define('DS', DIRECTORY_SEPARATOR);
set_include_path(get_include_path() . PS ."class ". DS ."ajaxController.php");

function core($class){
    include 'class/'.$class.'.php';
}
spl_autoload_register('core');
class Db_ext {
    protected static $dsn = 'mysql:dbname=sid2;host=localhost';
    protected static $user = 'root';
    protected static $password = '';
    protected static $_instance;
    public static function getInstance(){
        if(self::$_instance instanceof PDO){
            return self::$_instance;
        }else{
            try{
                return self::$_instance = new PDO(self::$dsn,self::$user,self::$password);
            }catch(Exception $error){
                echo $error->getCode().'<br>';
                echo $error->getMessage().'<br>';
                echo $error->getLine().'<br>';
            }
        }
    }
	protected function __clone(){}
}
$db = Db_ext::getInstance();