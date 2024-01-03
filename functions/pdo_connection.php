<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'php_project';
    global $pdo;
try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password, $options);
    return $pdo;
//    $user['first_name']
//    $user->first_name
}
catch (PDOException $e){
    echo 'error ' . $e->getMessage();
    exit;
}