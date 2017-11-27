<?php
  session_start();
  if($_SESSION["valid"]){
    header("location: account.php"); 
  } 
  
  $servername = getenv('IP'); 
  $username = getenv('C9_USER'); 
  $password = ""; 
  $dbname = "c9"; 
  
  $mysql = mysqli_connect($servername, $username, $password, $dbname); 
  if(!$mysql) { 
    die("Connection failed"); 
  } 
  
  //Get user data 
  $uname = $_POST["uname"]; 
  $email = $_POST["email"]; 
  $password = $_POST["pwd"];
  
  $sql = "INSERT INTO account(uname, email, password) VALUES ('$uname','$email', '$password')"; 
  if (mysqli_query($mysql, $sql)){ 
    $sql1 = "SELECT uid FROM account WHERE email=\"$email\""; 
    $result = mysqli_query($mysql, $sql1); 
    $row1 = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $_SESSION["uid"] = $row1['uid']; 
    $_SESSION['valid'] = true; 
    header("Location: account.php"); 
    } 
  else { 
    echo "Error"; 
  } 
  mysqli_close($mysql); 
?>