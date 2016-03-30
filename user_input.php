<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
   <title>Upload Recipe</title>
   <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/user_input-mobile.css" media="screen and (max-width:480px)" />
  <link rel="stylesheet" href="css/user_input-tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
   <link rel="stylesheet" href="css/user_input-desktop.css" media="screen and (min-width:769px)" />
</head>
<body> 
<?php
require_once 'php/user_input validation.php';
?>    
<header>
   <h1>Share Your Recipes!</h1>
</header>

   <nav>
        <a href="homepage.html">Homepage</a> &nbsp;&nbsp;&nbsp;
        <ul>
          <li><a href="#">Recipes</a>&nbsp;&nbsp;&nbsp;
            <ul>
              <li><a href="user_input.php">Upload Recipe</a></li>
              <li><a href="viewall.php">Recipe Catalog</a></li>
            </ul>
          </li>
        </ul>
        <a href="#">Forum</a>
   </nav>

<form id='mainForm' name="mainForm" method="post" enctype="multipart/form-data" action="">
  <fieldset>
     <legend>Upload Your Recipe Here</legend>
      <p><span class="error">* All fields required.</span></p>
      <p>
       <label>Name (*accept letters, quotes, hyphens and underscores): </label><br/>
      <input type="text" placeholder="Enter Dish Name" name="dishname" id="dishname" 
      class="required" value="<?php echo $dishname;?>" size=30 />
     <span class="error">* <?php echo $nameErr;?></span></p>
     <p>
       <label>Choose a Type: </label><br/>
         <select name="type" >
          <option value="">Please Choose</option>
          <option value="Appetizers" <?php if ($type=="Appetizers") echo "selected";?>>Appetizers</option>
          <option value="Starters" <?php if ($type=="Starters") echo "selected";?>>Starters</option>
          <option value="Main Courses" <?php if ($type=="Main Courses") echo "selected";?>>Main Courses</option>
          <option value="Side Dishes" <?php if ($type=="Side Dishes") echo "selected";?>>Side Dishes</option>
          <option value="Desserts" <?php if ($type=="Desserts") echo "selected";?>>Desserts</option>
          <option value="Drinks" <?php if ($type=="Drinks") echo "selected";?>>Drinks</option>
          </select>
          <span class="error">* <?php echo $typeErr;?></span></p>
     </p>     
     <p>
       <label>Cook Time (integer number): </label><br/>
         <input type="text" value="<?php echo $cooktime;?>" name="cooktime" class="required" />
         <label>minutes</label>
         <span class="error">* <?php echo $timeErr;?></span>
     </p>  

     <p>
       <label id="difficultylabel">Difficulty: </label><br/>
        <input type="radio" name="difficulty" <?php if (isset($difficulty) && $difficulty=="Low") echo "checked";?> value="Low" >Low
        <input type="radio" name="difficulty" <?php if (isset($difficulty) && $difficulty=="Medium") echo "checked";?> value="Medium" >Medium
        <input type="radio" name="difficulty" <?php if (isset($difficulty) && $difficulty=="High") echo "checked";?> value="High" >High
        <span class="error">* <?php echo $difficultyErr;?></span>
     </p> 
     <p>
       <label>Description: </label><br/>
      <textarea name="recipe" placeholder="Enter recipe here" rows="10"
        cols="70" class="required"><?php echo $recipe;?></textarea>
        <span class="error">* <?php echo $recipeErr;?></span>
     </p>     
   
     <label>Upload a Pic of the Dish (small than 488kb, JPG, JPEG, PNG & GIF only): </label>
     <input type="file" name="fileToUpload" id="fileToUpload"><span class="error">* <?php echo $imageErr;?></span>
     <br><input type="submit" />  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <a href="viewall.php">
       <input type="button" name="viewall" value="View Recipe Catalog" />
      </a><br>
      <a id="backtohome" href="homepage.html">Back to Homepage</a>
  
  </fieldset>  
</form>

<footer>
  <a href="#">Contact Us</a> | <a href="#">About Us</a> | <a href="#">Download App</a>
  <p><em>Copyright &copy; 2015 Share Your Recipes</em></p>
</footer>
</body>

</html>