<?php

function validateForm($first, $last, $email) {
    if (empty($first) || empty($last) || empty($email)) {
        return false;
    } else {
        return true;
    }
}

function registerDiver($db, $first, $last, $phone, $address, $city, $state, $zip, $email) {
    if (validateForm($first, $last, $email)) {
        $SQLstring = "INSERT INTO divers VALUES (NULL, '$first', '$last', '$phone', '$address', '$city', '$state', '$zip', '$email')";

        $result = $db->exec($SQLstring);
        if ($result < 1) {
            $errors = $db->errorInfo();
            $error = $errors[2];
            include('error.php');
            exit;
        } else {
            return TRUE;
        }
    } else {
        die("<p>You must supply a first name, last name and email address to register! Click your browser's Back button to return to the previous page.</p>");
    }
}

function registerClass($db, $email, $class, $days, $time) {  // This function inserts a record into the divers class registration
    $SQLstring = "INSERT INTO registration VALUES('$email', '$class', '$days', '$time')";
    // UPDATE: Write the PHP commands to execute the SQL statement.  Use the function
    // registerDiver as a template.
    $db->exec($SQLstring);
}

function classSchedule($db, $email) {  // This function insert a record into the divers class registration page
    $SQLstring = "SELECT email, class, days, time FROM registration WHERE email='$email'";
    // UPDATE: Write the PHP commands to execute the SQL statement.  Return the results in a single
    // array using the fetchall PDOStatement function.
    $results = $db->query($SQLstring);



    if ($results->rowCount() == 0) { // This if statement checks to see if they registered for any classes.  
        die("<p>You have not registered for any classes! Click your browser's Back button to return to the previous page.</p>");
    } else {
        // Remove the null and write the command to return all the rows from $result using the PDOStatement fetchall command             
        $classes = $results->fetchall();
        return $classes;
    }
}

?>