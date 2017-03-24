<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <title>View Records</title>
</head>
<body>
  <?php
  $servername = "db";
  $username = "websiteuser";
  $password = "wStr0ngPassw0rd";
  $dbname = "websitedb";
  $tablename = "websitetable";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if (count($_GET) > 1 && $_GET['cmd'] == 'del') {
    $id = $_GET['id'];
    $sql = "DELETE FROM $tablename WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "Record deleted.\n\n";
    }
  }
  if (count($_POST) > 1) {
    $name = $_POST['name'];
    $spec = $_POST['spec'];
    $sql = "INSERT INTO $tablename(name, spec) VALUES ('$name', '$spec')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "Record added.\n\n";
    }
  }
  $sql = "SELECT id, name, spec FROM $tablename";
  $result = mysqli_query($conn, $sql);

  echo "<table border='1' cellpadding='10'>";
  echo "<tr> <th>ID</th> <th>Name</th> <th>Spec</th> <th></th></tr>";

  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['spec'] . '</td>';
    echo '<td><a href="index.php?cmd=del&id=' . $row['id'] . '">Delete</a></td>';
    echo "</tr>";
  }
  echo "</table>";
  echo "<br>";

  echo '<form class="floatLeft" method="POST">';
  echo '<fieldset>';
  echo '<legend>Insert data</legend>';
  echo '<label for="name">Name</label>';
  echo '<input type="text" name="name" id="name" placeholder="vahit" pattern="^[a-zA-Z]+((\s{1}[a-zA-Z]+)+|$)" required autofocus>';
  echo '<label for="spec">Spec</label>';
  echo '<input type="text" name="spec" id="spec" placeholder="engineer" pattern="^[a-zA-Z]+((\s{1}[a-zA-Z]+)+|$)">';
  echo '<input type="submit" value="Insert Data" class="buttom">';
  echo '<input type="reset" value="Clear" class="buttom">';
  echo '</fieldset>';
  echo '</form>';

  mysqli_close($conn);
  ?>
  <p><a href="index.php">Refresh</a></p>
</body>
</html>
