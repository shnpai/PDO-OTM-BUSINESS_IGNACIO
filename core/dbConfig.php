<?php  
// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$dbname = "business";
// Data Source Name (DSN) for PDO connection
$dsn = "mysql:host={$host};dbname={$dbname}";

// Create PDO instance and set timezone to UTC+08:00 (Philippines)
$pdo = new PDO($dsn,$user,$password);
$pdo->exec("SET time_zone = '+08:00';");

?>
