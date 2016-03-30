
<?php
require_once 'login.php';  // Contains our mysql login credentials
echo "login params: hostname = " . $hn . "; username = " . $un . "; password = ******* " . "; db name = " .$db;

// Create connection   dont have db name yet bc have not created one. just connect to mysql only

$conn = new mysqli($hn, $un, $pw);




// Check connection

 if ($conn->connect_error) {
     echo "<br/>";
     die("Die - Connection failed: " . $conn->connect_error);

}


// Create database

$sql = "CREATE DATABASE " . $db ;
echo "<br/>";
echo "Create db sql: " . $sql;   //for debug
if ($conn->query($sql) === TRUE) {
     echo "<br/>";
     echo "Database created successfully";  //for debug
}   else {
     echo "<br/>";
     die("Die - Create DB failed: " . $conn->error);
}


// Close connection then reopen with $db
$conn->close();
$conn = new mysqli($hn, $un, $pw, $db);  //a new connection
if ($conn->connect_error) {
   echo "<br/>";
   die("Connection with db failed: " . $conn->connect_error);
}  else {
     echo "<br/>";
     echo "Connection with db: $db succeeded";
}


$sql = "CREATE TABLE mymusic (" .  // only for more readable to break into several lines
 "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, " .
 "artist VARCHAR(30) NOT NULL, " .
 "album VARCHAR(30) NOT NULL)";

echo "<br/>";
echo "sql for create table: " . $sql;

if ($conn->query($sql) === TRUE) {
    echo "<br/>";
    echo "Table created successfully";

} else {
    echo "<br/>";
    echo "Error creating table: " . $conn->error;

}




echo "<br/>";
echo "Connected successfully";

 ?>
