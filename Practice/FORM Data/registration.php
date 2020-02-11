<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
    </head>
    <body>        
        <?php
            if ($_POST['form_submitted'] == 1) {
                echo "Name: " . $_POST['firstname'] . " " . $_POST['lastname'] . "<br/>";
                echo "Gender: " . $_POST['gender'] . "<br/>";
                echo "State: " . $_POST['state'] . "<br/>";
            }
        ?>
        <h2>Registration Form</h2>
        <form action="registration.php" method="POST"> 
            First name:<input type="text" name="firstname"> <br> 
            Last name:<input type="text" name="lastname">  <br> 
            Gender: M <input type="radio" name="gender" value="M"/> F <input type="radio" name="gender" value="F"/> <br/>
            State: <select name="state">
                <option value="ks">Kansas</option>
                <option value="mo">Missouri</option>
            </select>
            <input type="hidden" name="form_submitted" value="1" />
            <input type="submit" value="Submit">
        </form>
    </body>
</html>