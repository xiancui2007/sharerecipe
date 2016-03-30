<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="utf-8">
   <title>Recipe Catalog</title>
 <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/recipe display-mobile.css" media="screen and (max-width:480px)" />
  <link rel="stylesheet" href="css/recipe display-tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
   <link rel="stylesheet" href="css/recipe display-desktop.css" media="screen and (min-width:769px)" />

</head>
<body> 
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
<form action='' method='post'>
<table>
  <caption><h2> Recipe Catalog </h2></caption>
 
   <thead>
    <tr>
      <th scope="col">Pic</th>
      <th scope="col">Name</th>
      <th scope="col" class="hide">Type</th>
      <th scope="col" >Cook Time(min)</th>
      <th scope="col" class="hide">Difficulty</th>
      <th scope="col">Action</th>
   </tr>
 </thead>

 <tbody>

<?php

 require 'php/viewall table&button action.php';

?>

 </tbody>      
</table>
<br><br><br>
<div id="deletebutton">
<input type='submit' name='deleterow' value='Delete Selected Recipes' /></div>
</form>
<br>
<a id="backtohome" href="homepage.html">Back to Homepage</a>
  <footer>
  <a href="#">Contact Us</a> | <a href="#">About Us</a> | <a href="#">Download App</a>
  <p><em>Copyright &copy; 2015 Share Your Recipes</em></p>
</footer>
</body>

</html>