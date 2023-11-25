<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "client";

    $connection = new mysqli($servername, $username, $password, $database);

  
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM clients WHERE id=?";
    $stmt = $connection->prepare($sql);

    if (!$stmt) {
        die("Error in preparing statement: " . $connection->error);
    }


    $stmt->bind_param("i", $id);

    $stmt->execute();

    $stmt->close();
    $connection->close();
}

header("location: index.php");
exit;
?>
