<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Retrieve the values from the web page for x and y
        $x = $_POST['x'];
        $y = $_POST['y'];

        function switchVal($value1, $value2) {
            echo "Switching by Value <br/>";
            $temp = $value1;
            $value1 = $value2;
            $value2 = $temp;
            echo "Values inside function X:$value1 Y:$value2 <br/>";
        }

        function switchRef(&$value1, &$value2) {
            echo "Switching by Reference <br/>";
            $temp = $value1;
            $value1 = $value2;
            $value2 = $temp;
            echo "Values inside function X:$value1 Y:$value2 <br/>";
        }
        ?>
        <form action="switchExercise.php" method="post">
            $x= <input name="x" style="width: 50px;" type="number" > (enter a number value to use for X)<br/>
            $y= <input name="y" style="width: 50px;" type="number" >  (enter a number value to use for Y)<br/>
            <br/>
            <input type="submit" name="switchVal" value="    Switch By Value    "/><br/>
            <input type="submit" name="switchRef" value="Switch By Reference"/><br/>            
        </form>
        <?php
        if (!empty($x) && !empty($y)) {
            echo "Values before function call <br/>";
            echo "X: $x  Y: $y <br/>";

            // Write a conditional statement to determine which button was selected        
            // and call the appropriate function 
            if (isset($_POST["switchVal"])) {
                switchVal($x, $y);
            } else {
                switchRef($x, $y);
            }
            
            echo "Values after function call <br/>";            
            echo "X: $x  Y: $y";            
        }
        ?>
    </body>
</html>