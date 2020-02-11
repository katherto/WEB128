<?php
require_once "config.php";
try {
    // Determine if they are searching by name or department.  The query for search by name does use a fuzzy search '%' so you can look for name beginning with a couple letters
    if (!empty($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
        $sql = "SELECT *
    FROM employees
    WHERE lastname LIKE '$lastname%'";
    } elseif (!empty($_POST['department'])) {
        $department = $_POST['department'];
        $sql = "SELECT *
    FROM employees
    WHERE department = '$department'";
    }
    // From the PDO database object $connection create a PDOStatement passing it our $sql statement.
    $statement = $connection->prepare($sql);
    $statement->execute();
    // $result is a two dimensional array representing our results from the query.
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $error->getMessage();
}
// Make sure that we have $results is not null (the query executed) and that there were matching records rowCount > 0
if ($result && $statement->rowCount() > 0) {
    // Begin generating our results table HTML
    echo "
    <h2>Results</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Department</th>
                <th>Location</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>";
    // Loop through the results.  Remember that $result is a two dimensional array so as we use foreach to loop through $row is a record representing a 
    // single row but that row is itself on array with the elements be the attributes of the record (firstname, lastname, etc...)
    foreach ($result as $row) {
        echo "
                <tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["firstname"] . "</td>
                    <td>" . $row["lastname"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["department"] . "</td>                        
                    <td>" . $row["location"] . "</td>                                                
                    <td>" . $row["added"] . "</td>                                                
                </tr>";
    }
    echo "
            </tbody>
        </table>";
} else {
    echo "No results found";
}
echo "<script>document.getElementById('selectform').style.display = 'block';</script>";
?>