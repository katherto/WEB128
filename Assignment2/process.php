<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Process the HTML form data with the POST method</title>
    </head>
    <body>
        <?php
            echo 'Name: ' . htmlspecialchars(filter_input(INPUT_POST, 'Name')) . '<br/>';
            echo 'Password: ' . htmlspecialchars(filter_input(INPUT_POST, 'Password')) . '<br/>';
            echo 'Season: ' . filter_input(INPUT_POST, 'Seasons') . '<br/>';
            echo 'Country: ' . filter_input(INPUT_POST, 'Country') . '<br/>';
            echo 'Color(s) Selected: <br/>';
            
            if ( isset($_POST['Colors1']) ) {
                echo filter_input(INPUT_POST, 'Colors1') . '<br/>';
            }
            if ( isset($_POST['Colors2']) ) {
                echo filter_input(INPUT_POST, 'Colors2') . '<br/>';
            }
            if ( isset($_POST['Colors3']) ) {
                echo filter_input(INPUT_POST, 'Colors3') . '<br/>';
            }
            if ( isset($_POST['Colors4']) ) {
                echo filter_input(INPUT_POST, 'Colors4') . '<br/>';
            }
            
            echo 'Comments: ' . htmlspecialchars(filter_input(INPUT_POST, 'Comments'));
        ?>
    </body>
</html>