<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Register Diver</title>
        <link rel="stylesheet" href="php_styles.css" type="text/css" />
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <h1>Aqua Don's Scuba School</h1>
        <h2>Registration Confirmation</h2>
        <?php
        if (empty($email)) {
            exit("<p>You must enter a diver ID! Click <a href='index.php'>here</a> to return to the entry page.</p>");
        }
        if (!empty($msg)) {
            echo $msg;
        }
        ?>
        <form method="post" action="index.php">
            <p><strong>Select the class you would like to take:</strong><br />
                <input type="radio" name="class" value="Beginning Open Water" checked="checked" />Beginning Open Water<br />
                <input type="radio" name="class" value="Advanced Open Water" />Advanced Open Water<br />
                <input type="radio" name="class" value="Rescue Diving" />Rescue Diving<br />
                <input type="radio" name="class" value="Divemaster Certification" />Divemaster Certification<br />
                <input type="radio" name="class" value="Instructor Certification" />Instructor Certification<br />
                <p><strong>Available Days and Times:</strong><br />
                    <select name="days">
                        <option selected value="Mondays and Wedenesdays"> Mondays and Wednesdays</option>
                        <option value="Tuesdays and Thursdays"> Tuesdays and Thursdays</option>
                        <option value="Wednesdays and Fridays"> Wednesdays and Fridays</option>
                    </select>
                    <select name="time">
                        <option selected value="9 a.m. - 11 a.m.">9 a.m. - 11 a.m.</option>
                        <option value="1 p.m. - 3 p.m.">1 p.m. - 3 p.m.</option>
                        <option value="6 p.m. - 8 p.m.">6 p.m. - 8 p.m.</option>
                    </select>
                </p>
                <p><input name="action" type="submit" value="Register Class" />
                    <input type="reset" /></p>
        </form><br/>

        <form method="post" action="index.php">
            <input type="submit" name="action" value="Review Schedule" />
        </form>
        <form method="post" action="index.php">
            <p><input type="submit" name="action" value="Logout" />
        </form>
    </body>
</html>
