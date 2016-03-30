<?php


 require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) {die($conn->connect_error);}

    if (isset($_POST['deleterow'])) 
  {
    $delete=$_POST['delete'];   //delete is an array with key as normal index, value as rowid
    $deleteimage=$_POST['dishimage'];  //deleteimage is an array of all the pics with key as rowid, value as dishname
   // echo print_r($deleteimage); used to test if row[id] and pic are matched 
    foreach ($delete as $value) {  //the $value in array"delete" is the "value=..." in checkbox, which is row[id]

    $query  = "DELETE FROM project2 WHERE id='$value'";
    unlink($deleteimage[$value]);  //$value is row[id], this delete the associated pic 
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";}
  }
  if (isset($_POST['checkrow']))
  { 
    //echo print_r($_POST['checkrow']); //the form is outside table, only one big form, and we have many button "check"&"update", 
    //by default it will only save the last record's info,so we need to put these buttons to array to record all rows' info. here we 
     //use print_r to see that post checkrow return the key "rowid" and value "check", so we just need to get the key, ie rowid
    $id= key($_POST['checkrow']);
    $_SESSION["id"]=$id;
    header("Location: recipedetail.php");
  }

    if (isset($_POST['updaterow']))
  { $id= key($_POST['updaterow']);
    $_SESSION["id"]=$id;
    header("Location: updaterecipe.php");
  } 


$sql = "SELECT dishimage, id, dishname, type, cooktime, difficulty, recipe FROM project2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
     //foreach($row as $cell) {
     //   echo "<td>$cell</td>";}
      echo "<td><img src='".$row["dishimage"]."' alt='Dish Image'></td><td>".
      $row["dishname"]."</td><td class='hide'>".$row["type"]."</td><td>".$row["cooktime"].
      "</td><td class='hide'>".$row["difficulty"]."</td>";

    echo 
    "<td>
    <input type='hidden' name='dishimage[".$row['id']."]' value='".$row['dishimage']."'>
    <input type='submit' name='checkrow[".$row['id']."]' value='Check' /><br><br>
    <input type='submit' name='updaterow[".$row['id']."]' value='Update'/><br><br>
    <input type='checkbox' name='delete[]' value='".$row['id']."'/><label>Delete</label>
    </td></tr>";

}
}

 $result->close();
$conn->close();
?>
