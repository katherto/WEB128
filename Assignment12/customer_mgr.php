<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Upload Customers</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <div id="page">
            <div id="header">
                <h1>Customer Management</h1>
            </div>
            <div id="main">
                <h2>Upload Customers</h2>
                <form action="load_customers.php" method="post" id="load_customers" enctype="multipart/form-data" >
                    <input type="hidden" name="action" value="upload"/>
                    <td><label for="customerFile">Filename: </label><input type="file" name="customerFile" id="customerFile" /> </td>
                    <td><input type="submit" name="add" value="Upload Customers"/><br/></td>
                </form>
                <?php if (!empty($customers)) { ?>
                    <h3><?php echo $customers; ?> Customers Added</h3>
                <?php } ?>
            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>