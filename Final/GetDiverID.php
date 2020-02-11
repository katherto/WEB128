<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Register Diver</title>
        <link rel="stylesheet" href="php_styles.css" type="text/css" />
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <h1>Aqua Don's Scuba School Registration</h1>
        <p>Thanks <?php echo $first; ?>! You can use your email address <strong><?php echo $email; ?></strong> when you return to the site in the future to login.</p>
        <form action = "index.php" method="post">
            <p><input type="submit" name="action" value="Class Registration" /></p>
        </form>
    </body>
</html>
