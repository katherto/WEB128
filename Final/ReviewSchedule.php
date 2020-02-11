<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Review Schedule</title>
        <link rel="stylesheet" href="php_styles.css" type="text/css" />
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <h1>Aqua Don's Scuba School</h1>
        <h2>This is your current schedule</h2>
        <table width='100%' botder='1'>
            <tr><th>Class</th><th>Days</th><th>Time</th></tr>
            <?php
            foreach ($classes as $record) {
                print ("
                    <tr>
                    <td>" . $record[1] . "</td>
                    <td>" . $record[2] . "</td>
                    <td>" . $record[3] . "</td></tr>");
            }
            ?>
        </table><br/>
        <form method="post" action="index.php">
            <p><input type="submit" name="action" value="Class Registration" /></p>
        </form>

        <form method="post" action="index.php">
            <p><input type="submit" name="action" value="Logout" />
        </form>
    </body>
</html>