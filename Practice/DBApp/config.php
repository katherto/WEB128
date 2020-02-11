<?php
/**
 * Open a connection via PDO to create a 
 * new database and table with structure. 
 * */
try {
    $username = 'katherto';
    $password = 'web128@8033';
    $connection = new PDO("mysql:host=localhost;dbname=$username", $username, $password);
    $sql = file_get_contents("init.sql");
    $connection->exec($sql);
} catch (PDOException $error) {
    echo $sql . "<br />" . $error->getMessage();
}
?>