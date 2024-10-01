<?php
function runSqlScript($filePath, $dbName, $create=false)
{
    $servername = "localhost";
    $username   = "root";
    $password   = "";

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);

    $dbCheck = $conn->query("SHOW DATABASES LIKE '$dbName'");
    if ($dbCheck->num_rows > 0)
    {
        if (!$create)
            return;
        if ($conn->query("DROP DATABASE $dbName") === TRUE)
            ;
        else
           die("Error dropping database: " . $conn->error);
    }
    if ($conn->query("CREATE DATABASE $dbName") === TRUE)
        ;
    else
       die("Error creating database: " . $conn->error);

    $conn->select_db($dbName);
    $sql = file_get_contents($filePath);
    if ($sql === false)
        die("Error reading the file: " . $filePath);

    if ($conn->multi_query($sql))
    {
        do {
            if ($result = $conn->store_result()) {
                while ($row = $result->fetch_row()) {}
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());
    }
    else
        die("Error executing the SQL script: " . $conn->error);
    $conn->close();
}
?>