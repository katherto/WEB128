<?php
require_once "config.php";
// construct an array of the information we will use to pass into our sql INSERT statement
$new_user = array( $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['department'], $_POST['location'] );
// create a PHP variable to hold our sql INSERT satatment
$sqlInsert = "INSERT INTO employees (firstname, lastname, email, department, location, added) VALUES (? , ?, ?, ?, ?, now())";  // the "?" are place holders for the array of data we pass in when we execute the PDOStatement (Links to an external site.) object method.

try {
 $statement = $connection->prepare($sqlInsert); 
 $rowsInserted=$statement->execute($new_user);
    // Display the number of entries inserted into the database.  This should always be 1 if successful.
    echo $rowsInserted . " records added to the system.<br/>";
} catch (PDOException $error) {
    echo $sql . "<br />" . $error->getMessage();
}
echo "<script>document.getElementById('insertform').style.display = 'block';</script>";
?>