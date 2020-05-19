<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

  <form action="" method="get">
    <select id="year" name="year">
      <option value="All" selected hidden>All</option>
      <option value='2005'>2005</option>
      <option value='2006'>2006</option>
      <option value='2007'>2007</option>
      <option value='2008'>2008</option>
      <option value='2009'>2009</option>
      <option value='2010'>2010</option>
      <option value='2011'>2011</option>
      <option value='2012'>2005</option>
      <option value='2013'>2013</option>
      <option value='2014'>2014</option>
      <option value='2015'>2015</option>
    </select>
    <select id='gender' name=gender>
      <option value="Both" selected>Both</option>
      <option value='Male'>Male</option>
      <option value='Female'>Female</option>
    </select>
    <input type="submit">
  </form>
  <div class="table-responsive">
  <table class="table-bordered" style=”float:left; margin-right:10px;”>
    <tr>
      <th>Name</th>
      <th>Ranking</th>
      <th>Year</th>
      <th>Gender</th>
    </tr>

  <?php
  $username ="root";
  $password ="root";
  $host="localhost";
  $db='HW3';
  $year= $_GET["year"];
  $gender = $_GET["gender"];
  if ($gender =='Male') {
      $g='m';
  } else {
      $g='f';
  }

  $conn = mysqli_connect($host, $username, $password, $db);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
if ($year !='All' && $gender !='Both') {
    $sql = "SELECT * FROM BabyNames where Year=$year and Gender='$g' ORDER BY Ranking,Gender LIMIT 5";
} elseif ($year =='All' && $gender =='Both') {
    $sql= "SELECT * FROM BabyNames ORDER BY Ranking,Gender LIMIT 5";
} elseif ($year =='All') {
    $sql= "SELECT * FROM BabyNames where Gender='$g' ORDER BY Ranking,Gender LIMIT 5";
} else {
    $sql= "SELECT * FROM BabyNames where Year=$year ORDER BY Ranking,Gender LIMIT 5";
}
echo "Selected Year:$year</br>";
echo "Selected Gender:$gender";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>';
          echo $row["Name"];
          echo '</td>';
          echo '<td>';
          echo $row["Ranking"];
          echo '</td>';
          echo '<td>';
          echo $row["Year"];
          echo '</td>';
          echo '<td>';
          echo $row["Gender"];
          echo '</td>';
          echo '</tr>';
      }
  } else {
      echo "0 results";
  }
  $conn->close();
  ?>
  </table>
</div>

</body>

</html>
