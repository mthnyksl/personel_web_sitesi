<?php
/*
 * Veri tabanı ayarları
 */
$host = "localhost";
$dbname = "personel";
$dsn = "mysql:host={$host};dbname={$dbname};";
$username = "root";
$passwd = "12345678";
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
try{
  $db = new PDO($dsn, $username, $passwd, $options);
}catch(Exception $e){
    die($e->getMessage());
}
date_default_timezone_set('Europe/Istanbul');
