<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="php_styles.css" type="text/css" />
        <meta http-equiv="content-type"
              content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <h1>Aqua Don's Scuba School</h1>
        <h2>Learn to Scuba Dive</h2>
        <p>Welcome to Aqua Don's Scuba School! We offer a variety of scuba diving classes for all levels of experience. We recognize that a good diver never stops learning. To sign up for a course, please fill out the New Diver Registration form and click the Get Diver ID button to obtain a diver ID. If you are a current student, enter your diver ID number and click the Class Registration button to register for new classes or to review your current schedule.</p>
        <h2>New Diver Registration</h2>
        <form method="post" action="index.php">
            <table frame="border" rules="cols">
                <tr><td align="right" valign="top"><p>First Name <input type="text" name="first" size="30" /></p>
                        <p>Last Name <input type="text" name="last" size="30" /></p>
                        <p>Phone <input type="text" name="phone" size="30" /></p></td>
                    <td align="right" valign="top">
                        <p>Address <input type="text" name="address" size="40" /></p>
                        <p>City <input type="text" name="city" size="10" />
                            State <input type="text" name="state" size="2" maxlength="2" />
                            Zip <input type="text" name="zip" size="10" maxlength="10" /></p>
                        <p>E-Mail <input type="text" name="email" size="40" /></p>
                    </td></tr>
            </table>
            <p><input type="submit" name="action" value="Register Diver" />
                <input type="reset" /></p>
        </form>
        <hr/>
        <h2>Returning Divers</h2>
        <form method="post" action="index.php">
            <p>E-Mail: <input type="text" name="email" />
                <input type="submit" name="action" value="Class Registration" /></p>
        </form>
    </body>
</html>
