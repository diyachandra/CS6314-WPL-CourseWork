<?php
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "PW7";
$port = "8889";
$conn = new mysqli($host, $username, $password, $dbname, $port);
$url = $_SERVER['REQUEST_URI'];
if ((strlen($url) == 6) || (strlen($url) == 7)) {
    $sql = "select * from Books";
} else {
    $id = substr($url, 7);
    if (is_numeric($id)) {
        $sql = sprintf("select * from Books where ISBN = %s", $id);
    } else {
        echo ("Invalid Format");
    }
}


$result_array = array();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($result_array, $row);
    }
}
/* send a JSON encoded array to client */
header('Content-type: application/json');
if (sizeof($result_array) > 0) {
    echo json_encode($result_array);
}
if ((sizeof($result_array) == 0) && (is_numeric($id))) {
    echo ("Book ID does not exist");
}

$conn->close();
