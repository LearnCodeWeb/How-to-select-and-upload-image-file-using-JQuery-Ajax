<?php
error_reporting(E_ALL);

define('DB_NAME', 'TEST');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
 
/*** DB INCLUDES ***/
include_once 'Database.php';
 
/*** DB CONNECTION ***/
$dsn        =   "mysql:dbname=".DB_NAME.";host=".DB_HOST."";
$pdo        =   '';
try {$pdo   =   new PDO($dsn, DB_USER, DB_PASSWORD);} catch (PDOException $e) {echo "Connection failed: " . $e->getMessage();}
 
/*Classes*/
$db         =   new Database($pdo);
?>