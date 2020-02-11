<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $file = fopen('/var/www/web128/jsonData.csv', 'r');
            
            while ($line = fgets($file)) {
                $data = explode("\t", $line);
                $dataArray[$data[10]] = array(
                    "first_name" => $data[0],
                    "last_name" => $data[1],
                    "company_name" => $data[2],
                    "address" => $data[3],
                    "city" => $data[4],
                    "county" => $data[5],
                    "state" => $data[6],
                    "zip" => $data[7],
                    "phone1" => $data[8],
                    "phone2" => $data[9],
                    "email" => $data[10],
                    "web" => $data[11]);
                
                $data= null;
            
                if (isset($_POST['email'])) {
                    $data[]= $dataArray[$_POST['email']];
                    $json = json_encode($data);
                    echo $json;
                }
                
                if (isset($_POST['state'])) {
                    foreach ($dataArray as $record) {
                        if ($record['state'] == $_POST['state']) {
                            $data[] = $record;
                        }
                    }
                    $json = json_encode($data);
                    echo $json;
                } 
            }
        ?>
    </body>
</html>
