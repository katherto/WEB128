<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Table Generation</title>
    </head>
    <body>
        <?php
            $tableData = array(
              array('Month' => 'JAN',  'Sales' => 3453, 'Quotes' => 1313, 'Visitors' => 393),
              array('Month' => 'FEB', 'Sales' => 1833, 'Quotes' => 2191, 'Visitors' => 193),
              array('Month' => 'MAR', 'Sales' => 15321, 'Quotes' => 1671, 'Visitors' => 112),
              array('Month' => 'APR', 'Sales' => 2121, 'Quotes' => 1156, 'Visitors' => 231),
              array('Month' => 'MAY', 'Sales' => 1821, 'Quotes' => 1213, 'Visitors' => 343),
              array('Month' => 'JUN', 'Sales' => 3453, 'Quotes' => 1313, 'Visitors' => 198),
              array('Month' => 'JUL', 'Sales' => 4523, 'Quotes' => 1111, 'Visitors' => 149),
              array('Month' => 'AUG', 'Sales' => 1302, 'Quotes' => 2111, 'Visitors' => 213),
              array('Month' => 'SEP', 'Sales' => 3811, 'Quotes' => 4313, 'Visitors' => 373),
              array('Month' => 'OCT', 'Sales' => 9173, 'Quotes' => 2213, 'Visitors' => 319),
              array('Month' => 'NOV', 'Sales' => 1873, 'Quotes' => 1983, 'Visitors' => 209),
              array('Month' => 'DEC', 'Sales' => 7521, 'Quotes' => 1513, 'Visitors' => 198)
            );
            
            function tablegen ($data) {
                echo "<table>\n";
                $header = array_keys($data[0]);
                echo "            <thead>\n";
                echo "                <tr>\n";
                foreach ($header as $title) {
                    echo "                    <th>$title</th>\n";
                }
                echo "                </tr>\n";

                echo "            </thead>\n";
                echo "            <tbody>\n";
                   foreach ($data as $k => $v) {
                       echo "                <tr>\n";
                       
                       foreach ($v as $value) {
                           echo "                    <td>$value</td>\n";
                       }
                       echo "                </tr>\n";
                   }
                echo "            </tbody>\n";
                echo "        </table>\n";
            }
            
            tablegen($tableData);
        ?>
    </body>
</html>