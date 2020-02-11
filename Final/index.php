<?php

// Include your database.php here
require_once('database.php');
require_once('diveShopModel.php');


if (!session_id()) { // This if statement will check to see if we have started a session
    // UPDATE:  Start a SESSION to manage our web application if it has not been started yet.
    session_start();
}
$email = $_SESSION['email'];  // Retrieve the current email from the SESSION if it exists otherwise email will be null

// This is the controller file and identifies the action that needs to be taken
// in the web application.
// 
// Modify the switch statement below to perform the required actions.  The web
// form buttons are named 'action' and all web forms are usign the method POST
// to submit data.
// UPDATE:  assign the PHP variable $action the value from the web form button 
// that was pressed.  Remember all web form buttons are named called 'action'
$action = filter_input(INPUT_POST, 'action');  // Replace null with the appropriate $_POST variable
// UPDATE:  Use this switch statements to perform each of the web app functions.
switch ($action) {
    case 'Register Diver':
        // Replace the empty '' with the appropriate FORM POST variable.
        $first = htmlspecialchars(filter_input(INPUT_POST, 'first'));
        $last = htmlspecialchars(filter_input(INPUT_POST, 'last'));
        $phone = htmlspecialchars(filter_input(INPUT_POST, 'phone'));
        $address = htmlspecialchars(filter_input(INPUT_POST, 'address'));
        $city = htmlspecialchars(filter_input(INPUT_POST, 'city'));
        $state = htmlspecialchars(filter_input(INPUT_POST, 'state'));
        $zip = htmlspecialchars(filter_input(INPUT_POST, 'zip'));
        $email = htmlspecialchars(filter_input(INPUT_POST, 'email'));
        // UPDATE:  Write the PHP code to call the function registerDiver from 
        // the diveShopModel. This will insert the new diver into the database
        if (registerDiver($db, $first, $last, $phone, $address, $city, $state, $zip, $email)) {  //Replace null with the function call to register the diver passing the appropriate parameters
            // UPDATE:  If the Diver was successfully registered then create/update
            // a SESSION variable for the email address called 'email'            
            $_SESSION['email'] = $email; //Replace null with the appropriate variable
        }
        require_once ('GetDiverID.php');
        break;

    case 'Class Registration':
        // This action will display the class registration form
        // I CAN WRITE A STATEMENT $email = filter_input(INPUT_POST, 'email'); here to make the register class button work on a blank session, but it will take non-valid emails and push through
        require_once ('RegisterDiver.php');
        break;

    case 'Register Class':
        // Replace null with the appropriate SESSION/POST variable values
        $class = filter_input(INPUT_POST, 'class');
        $days = filter_input(INPUT_POST, 'days');
        $time = filter_input(INPUT_POST, 'time');

        // UPDATE: Write the PHP code to call the function from diveShopModel 
        // to insert the new class into the diver's schedule
        registerClass($db, $email, $class, $days, $time); //Update the function call with the appropriate parameters
        $msg = "<p>You are registered for " . $class . " on " . $days . ", " . $time . "<br/>";
        require_once ('RegisterDiver.php');
        break;

    case 'Review Schedule':
        // UPDATE: Make the changes to call the function classSchedule from the 
        // diveShopModel file and assign the results into the $classes array
        $classes = classSchedule($db, $email); // Replace null with the function call to classSchedule and passing the appropriate parameters
        require_once ('ReviewSchedule.php');
        break;

    case 'Logout':
        // UPDATE: UNSET the SESSION variable 'email' and destroy the session.
        unset($_SESSION['email']);
        session_destroy();
    default:
        require_once ('RegistrationForm.php');
        break;
}
?>
