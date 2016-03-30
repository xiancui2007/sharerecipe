<?php 

 require_once 'login.php';
 $id   = $_SESSION["id"];
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) {die($conn->connect_error);}
  $sql = "SELECT dishimage, id, dishname, type, cooktime, difficulty, recipe FROM project2 where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $dishname=$row["dishname"];
      $type=$row["type"];
      $cooktime=$row["cooktime"];
      $difficulty=$row["difficulty"];
      $recipe=$row["recipe"];
      $dishimage=$row["dishimage"];
    }
}
?>