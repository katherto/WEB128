<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Seems to be best solution, inquire about it
    $file = $_FILES['customerFile']['tmp_name'];
    $customers = addCustomers($file);
}

function addCustomers($file) {
    require_once ('database.php');
    if (is_file($file)) {
        $fh = fopen($file, 'rb');
        // The following while statement will loop through the file until the end of the file (help see page 748)
        while ($line = fgets($fh)) {
            $line = trim($line);
            $data = explode(',', $line);
            $pwd = sha1($data[0] . $data[1]);
            $query = "INSERT INTO customers (customerID, emailAddress, password, firstName, lastName)
                      VALUES (null, '" . $data[0] . "', '" . $pwd . "', '" . $data[2] . "','" . $data[3] . "')";
            try {
                $statement = $db->prepare($query);
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error_message= $e->getMessage();
                include('/var/www/web128/database_error.php');
            }
            $count++;
        }
        fclose($fh);
    } else {
        echo "Error: " . $file . " does not exist<br />";
    }
    return $count;
}

require_once ('customer_mgr.php');  // This is our VIEW file
?>