<!DOCTYPE html>
<html>
    <head>
        <title>PHP Guessing Game</title>
    </head>
    <body>
        <?php
        if (isset($_POST['myguess'])) {
            $myguess = filter_input(INPUT_POST, myguess);
        }
        if (isset($_POST['guesses'])) {
            $guesses = filter_input(INPUT_POST, guesses) + 1;
        } else {
            $guesses = 0; // on first load of the page this will set amount of guesses at zero
        }
        if (isset($_POST['secretnumber'])) {
            $secretnumber = filter_input(INPUT_POST, 'secretnumber');
        } else {
            $secretnumber = rand(1, 100); // on first load of the page this will set the random number to guess
        }
        if ($myguess === $secretnumber) {
            echo "<h2>You guessed my secret " . $secretnumber . "</h2>";
            exit;
        }
        if ($guesses == 5) {
            echo "The game is over, you have used all your guesses.";
            exit;
        }
        if ($myguess) {
            echo "<h3>";
            if ($myguess > $secretnumber) {
                echo $myguess . " is to High";
            } else { // if we get here we know it must be to low since it was not correct and it was not too high
                echo $myguess . " is to Low";
            }
            echo "</h3>";
        }
        ?>
        <h3>I have a secret number between 1 and 100</h3>
        <h4>You have made <?php echo $guesses; ?> guesses and have <?php echo 5 - $guesses; ?> remaining.</h4>
        <FORM method='POST' action='guess.php'>
            <input type='hidden' name='secretnumber' value ='<?php echo $secretnumber; ?>' />
            <input type='hidden' name='guesses' value='<?php echo $guesses; ?>' />
            My Guess: <input type='number' name='myguess'/><br/>
            <input type = "submit" value = "Guess" /></p>
        </FORM>
    </body>
</html>