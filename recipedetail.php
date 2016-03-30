<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Recipe Detail</title>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/recipe detail-mobile.css" media="screen and (max-width:480px)" />
  <link rel="stylesheet" href="css/recipe detail-tablet.css" media="screen and (min-width:481px) and (max-width:768px)"/>
   <link rel="stylesheet" href="css/recipe detail-desktop.css" media="screen and (min-width:769px)" />

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
<h2>Recipe Detail</h2>
<?php 
require_once "php/get_recipe_detail.php";
?>
<table>
  <caption><?php echo $dishname;?></caption>
   <tr>
      <td colspan="4"><img src="<?php echo $dishimage;?>" alt="<?php echo $dishname;?>"/>
      </th>    
   </tr>
   <tr>
    <th>Name</th>
      <th>Type</th>
      <th>Cook Time</th>
      <th>Difficulty</th>
   </tr>
   <tr>
      <td><?php echo $dishname;?></td>
      <td><?php echo $type;?></td>
      <td><?php echo $cooktime;?>min</td>
      <td><?php echo $difficulty;?></td>
  </tr>
   <tr>
      <th colspan="4">Detailed Recipe</th>
   </tr>
  <tr>
     <td colspan="4">

        <p><?php echo $recipe;?></p>
      </td>
  </tr>
   
</table>

<br><br><br>
<div id="backtohome"><a href="homepage.html">Back to Homepage</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="viewall.php">Back to Recipe Catalog</a></div>
<footer>
  <a href="#">Contact Us</a> | <a href="#">About Us</a> | <a href="#">Download App</a>
  <p><em>Copyright &copy; 2015 Share Your Recipes</em></p>
</footer>
</body>

</html>