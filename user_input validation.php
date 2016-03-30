<?php
 require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) {die($conn->connect_error);}

// define variables and set to empty values
$nameErr = $typeErr = $timeErr = $difficultyErr = $recipeErr = $imageErr= "";
//$name = $email = $gender = $comment = $website = ""; 
  
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
  //$uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) {
        $imageErr= "Please upload an image.";
        //$uploadOk = 0;
      }
  // Check if file already exists
if ($check== true && file_exists($target_file)) {
    $imageErr.= "File already exists.";
    //$uploadOk = 0; 
}  //not really need to check if file exists, when update, new file need to overwrite the old one, same name will just overwrite

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $imageErr.= "Size needs to be smaller than 488kb.";
  //  $uploadOk = 0;
}
// Allow certain file formats
if($check== true && $imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $imageErr.= "Only JPG, JPEG, PNG & GIF files are allowed.";
   // $uploadOk = 0;
}
/*if ($uploadOk == 1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }    need to upload after all errors cleared, or the pic will be uploaded without other inputs all get corrected*/  

if ($nameErr=="" && $typeErr == "" && $timeErr == "" && $difficultyErr =="" && $recipeErr == "" && $imageErr=="" 
  && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { 
   
     $_SESSION["dishimage"]= $target_file;
      $query    = "INSERT INTO project2 (dishname, type, cooktime, difficulty, recipe, dishimage)  VALUES" .
      "('$dishname', '$type','$cooktime', '$difficulty','$recipe', '$target_file')";
    $result   = $conn->query($query);
    if (!$result) {echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";} 
    else {
    header("Location: input_display.php");}
  }
  else {$imageErr.= "Upload failed";}

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>