<?php
  session_start();
  if(!$_SESSION["valid"]){
    header("location: logout.php"); 
  } 
  
  $servername = getenv('IP'); 
  $username = getenv('C9_USER'); 
  $password = ""; 
  $dbname = "c9"; 
  
  $mysql = mysqli_connect($servername, $username, $password, $dbname); 
  if(!$mysql) { 
    die("Connection failed"); 
  } 
  
  $uid = $_SESSION['uid'];
  $recipeID = $_POST["recipeID"]; 

  $sql = "INSERT INTO save(uid, recipeID) VALUES ('$uid','$recipeID')"; 
  if (mysqli_query($mysql, $sql)){ 
    $sql1 = "UPDATE recipe SET recipeCount = recipeCount + 1 WHERE recipeID = $recipeID";
    mysqli_query($mysql, $sql1);
    header("Location: recipe.php?recipeID=$recipeID"); 
    } 
  else { 
    echo "Error"; 
    header("Location: recipe.php?recipeID=$recipeID"); 
  } 
  mysqli_close($mysql);  
?>
