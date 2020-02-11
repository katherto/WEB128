<?php
$dsn = 'mysql:host=localhost;dbname=katherto';
$username = 'katherto';
$password = 'web128@8033';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}
?>