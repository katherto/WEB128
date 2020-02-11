<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Choose your State</title>
    </head>
    <body>        
        <h2>Dynamic Radio Buttons</h2>
        <form action="dynamicRadio.php" method="POST"> 
            Pick your State:<br> 
            <?php
                $states = array("Kansas" => 'KS', "Missouri" => 'MO', "Iowa" => 'IA', "Nebraska" => 'NE', "Maryland" => 'MD', "California" => 'CA');
                
                foreach($states as $key => $value) {
                    echo '<input name="state" type="radio" value="' . $value . '" /> '. $key .'<br />'; 
                }
            ?>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>