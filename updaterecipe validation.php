 <?php
 require_once 'login.php';
 $id= $_SESSION["id"];
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) {die($conn->connect_error);}
  $sql = "SELECT id, dishname, type, cooktime, difficulty, recipe, dishimage FROM project2 where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $dishname=$row["dishname"];
      $type=$row["type"];
      $cooktime=$row["cooktime"];
      $difficulty=$row["difficulty"];
      $recipe=$row["recipe"];
      $deleteimage=$row["dishimage"];
    }
  }

// define variables and set to empty values
$nameErr = $typeErr = $timeErr = $difficultyErr = $recipeErr = $imageErr= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["dishname"])) {
     $nameErr = "Name is required";
   } else {
     $dishname = test_input($_POST["dishname"]);
     $_SESSION["dishname"]=$dishname;
     // check if name only contains letters and whitespace
     if (!preg_match("/^[-_\'a-zA-Z ]+$/",$dishname)) {
       $nameErr = "Only letters, single quotes, hyphens, underscores and white space allowed"; 
     }
   }

   if ($_POST["type"]=="") {
     $typeErr = "Type is required";
   } else {
     $type = test_input($_POST["type"]);
    $_SESSION["type"]=$type;
    }
   
   if (empty($_POST["cooktime"])) {
     $timeErr = "Cooktime is required";
   } else {
     $cooktime = test_input($_POST["cooktime"]);
     $_SESSION["cooktime"]=$cooktime;
   
     if (!preg_match("/^[0-9]+$/",$cooktime)) {
       $timeErr = "Only accept integer numbers"; 
     }
   }

    if (empty($_POST["difficulty"])) {
     $difficultyErr = "Difficulty level is required";
   } else {
     $difficulty = test_input($_POST["difficulty"]);
     $_SESSION["difficulty"]=$difficulty;
   }
     

   if (empty(trim($_POST["recipe"]))) {
     $recipeErr="Recipe is required";
   } else {
     $recipe = test_input($_POST["recipe"]);
     $_SESSION["recipe"]=$recipe;
   }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 //if user also want to upload a pic, validate it
   if(!empty($_FILES["fileToUpload"]["name"])) {
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) {
        $imageErr= "Please upload an image.";
      }
  // Check if file already exists
if ($check== true && file_exists($target_file)) {
    $imageErr.= "File already exists.";
}  //not really need to check if file exists, when update, new file need to overwrite the old one, same name will just overwrite

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $imageErr.= "Size needs to be smaller than 488kb.";
}
// Allow certain file formats
if($check== true && $imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $imageErr.= "Only JPG, JPEG, PNG & GIF files are allowed.";
} 

if ($nameErr=="" && $typeErr == "" && $timeErr == "" && $difficultyErr =="" && $recipeErr == "" && $imageErr=="" 
  && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { 
   
     $_SESSION["dishimage"]= $target_file;
      $query= "UPDATE project2 
      SET dishname='$dishname', type='$type', cooktime='$cooktime', difficulty='$difficulty', recipe='$recipe', dishimage='$target_file'
      WHERE id='$id'";
      unlink($deleteimage);
    $result   = $conn->query($query);
    if (!$result) {echo "update failed: $query<br>" .
      $conn->error . "<br><br>";} 
    else {
    header("Location: input_display.php");}
  }}
if (empty($_FILES["fileToUpload"]["name"]) && $nameErr=="" && $typeErr == "" && $timeErr == "" && $difficultyErr =="" && $recipeErr == "")
{ $_SESSION["dishimage"]=$deleteimage;
  $query= "UPDATE project2 
      SET dishname='$dishname', type='$type', cooktime='$cooktime', difficulty='$difficulty', recipe='$recipe'
      WHERE id='$id'";
    $result   = $conn->query($query);
    if (!$result) {echo "update failed: $query<br>" .
      $conn->error . "<br><br>";} 
    else {
    header("Location: input_display.php");}}

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>