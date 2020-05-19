<?php
$host         = "localhost";
$username     = "root";
$password     = "root";
$dbname       = "HW3";
$year= $_GET["year"];
$gender = $_GET["gender"];
if ($gender =='Male') {
    $g='m';
} else {
    $g='f';
}
$result_array = array();
/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);
/* Check connection  */
if ($conn->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);
}

if ($year !='All' && $gender !='Both') {
    $sql = "SELECT * FROM BabyNames where Year=$year and Gender='$g' ORDER BY Ranking,Gender LIMIT 5";
} elseif ($year =='All' && $gender =='Both') {
    $sql= "SELECT * FROM BabyNames ORDER BY Year,Gender,Ranking";
} elseif ($year =='All') {
    $sql= "SELECT * FROM BabyNames where Gender='$g' ORDER BY Year,Gender,Ranking ";
} else {
    $sql= "SELECT * FROM BabyNames where Year=$year ORDER BY Year,Gender,Ranking";
}

$result = $conn->query($sql);
/* If there are results from database push to result array */
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($result_array, $row);
    }
}
/* send a JSON encded array to client */
header('Content-type: application/json');
echo json_encode($result_array);
$conn->close();
?>
