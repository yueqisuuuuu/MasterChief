<?php 
  session_start();
  if(isSet($_SESSION["uid"])){ 
    header("Location: logout.php"); 
  } 

  $servername = getenv('IP');
  $username = getenv('C9_USER');
  $password = "";
  $dbname = "c9";
  
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  
  if (!empty($email) && !empty($pwd)) { 
    $mysql = mysqli_connect($servername, $username, $password, $dbname);
    if(!$mysql) { 
      die("Connection failed"); 
    } 
    
    $sql = "SELECT * FROM account WHERE email=\"$email\""; 
    $result = mysqli_query($mysql, $sql); 
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    if ($row){
      if($pwd == $row['password']){ 
        $_SESSION['valid'] = true; 
        $_SESSION['uid'] = $row['uid']; 
        header("Location: account.php"); 
      }
      else{
        header("Location: index.php");
      }
    }
    else{
      header("Location: index.php");
    }
  }

  mysqli_close($mysql);
?>