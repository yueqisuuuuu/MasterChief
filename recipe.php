<?php 
  session_start();
  $uid = $_SESSION['uid'];
  
  $servername = getenv('IP');
  $username = getenv('C9_USER');
  $password = "";
  $database = "c9";

  $mysql = mysqli_connect($servername, $username, $password, $database);

  $recipeID=$_GET["recipeID"];
  
  $result = mysqli_query($mysql,"SELECT * FROM recipe WHERE recipeID=$recipeID");
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  
  $saved = mysqli_query($mysql,"SELECT * FROM save WHERE recipeID=$recipeID AND uid=$uid");
  
  $s = mysqli_fetch_array($saved, MYSQLI_ASSOC);
  
?>
  
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FALL 2017 OMIS 120 Final Project">
    <meta name="author" content="Yueqi Su">

    <title>Recipe - Master Chief</title>

    <link href="img/icon.png" type="image/gif" rel="shortcut icon" />

    <!-- Bootstrap core CSS -->
    <link href="source/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="source/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/recipe.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">Master Chief</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#explore">Explore</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link special" href="search.php?cat=none&cui=none&lev=none&rate=none&sort=none">Recipe</a>
            </li>
            <?php if($_SESSION['valid']){ ?>
              <div class="dropdown">
                <li class="nav-item">
                  <a class="nav-link special drop-link" href="account.php">Account <i class="fa fa-caret-down"></i></a>
                </li>
                <div class="dropdown-content">
                  <li class="nav-item">
                    <a id="sign-out" class="nav-link special drop-link" href="logout.php">Sign Out</a>
                  </li>
                </div>
              </div>
        <?php }
              else{ ?>
                <li class="nav-item">
                  <a id="sign-in" class="nav-link special" href="#" onclick="document.getElementById('login').style.display='block'">Sign In</a>
                </li>
              <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- recipe -->
    <section id="recipe">
      <div class="container">
        <div class="row">
          <div class="col-md-5 recipe-img">
            <img class="img-fluid" src="<?=$row['recipeImg']?>" alt="<?=$row['recipeName']?>">
            <div class="row recipe-review">
              <div class="col-md-4 col-lg-4 caption-left">
                <i class="fa fa-clock-o fa-2x"></i>
                <span class="recipe-hour"><?=$row['recipeHour']?></span>
              </div>
              <div class="col-md-4 col-lg-4 caption-mid">
                <?php if($_SESSION['valid']){ 
                  if ($s){
                    ?>
                    <button class="btn" id="gray-btn">Saved</button>
                 <?php }
                  else {
                ?>
                  <form id="save-recipe" action="save.php" method="post">
                    <input type="hidden" value="<?= $row['recipeID'] ?>" name="recipeID" />
                    <button class="btn" type="submit">Save</button>
                  </form>
                <?php } } ?>
              </div>
              <div class="col-md-4 col-lg-4 caption-right">
                <span class="recipe-rating"><?=$row['recipeCount']?> Saved</span>
              </div>
            </div>
          </div>
          <div class="col-md-7 recipe-detail">
            <h1 class="recipe-title"><?=$row['recipeName']?></h1>
            <p class="recipe-description"><?=$row['recipeDes']?></p>
            <hr>
            <h4>Ingredients</h4>
            <ul class="recipe-ingredient"><?=$row['recipeIng']?></ul>
            <hr>
            <h4>Directions</h4>
            <p class="recipe-direction"><?=$row['recipeDir']?></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Fall 2017 OMIS 120 Final Project</span>
          </div>
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; <a href="https://github.com/yueqisuuuuu/" target="_BLANK">Yueqi Su</a> 2017</span>
          </div>
        </div>
      </div>
    </footer>
  
  <!-- Pop Up Modal -->
  <div id="modal">
    <div id="login" class="modal">
      <form class="modal-content animate" action="login.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <h2 class="modal-title">Sign In</h2>
        <div class="container">
          <label><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
    
          <label><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="pwd" required>
            
          <button type="submit">Login</button>
        </div>
    
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="pwd">No Account? <a href="#" onclick="document.getElementById('login').style.display='none'; document.getElementById('signup').style.display='block'">Sign Up</a></span>
        </div>
      </form>
    </div>
    
    <div id="signup" class="modal">
      
      <form class="modal-content animate" action="signup.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <h2 class="modal-title">Sign Up</h2>
        <div class="container">
          <label><b>Name *</b></label>
          <input type="text" placeholder="Enter Name" name="uname" required>
          
          <label><b>Email *</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
    
          <label><b>Password *</b></label>
          <input type="password" placeholder="Enter Password" name="pwd" required>
            
          <button type="submit">Sign Up</button>
        </div>
    
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="pwd"><a href="#" onclick="document.getElementById('signup').style.display='none'; document.getElementById('login').style.display='block'">Sign In</a></span>
        </div>
      </form>
    </div>
  </div>
  
  <div id="clock">
  	<input type="number" id="hour" value="0" min="0" max="10"/>
  	<span>Hr</span>
  	<input type="number" id="minute" value="0" min="0" max="59"/>
  	<span>Min</span>
  	<input type="number" id="second" value="0" min="0" max="59"/>
  	<span>Sec</span>
    <br>
    <div id="btns">
    	<button onclick="timeout();">Start</button>
      <button onclick="clearTime();">Reset</button>
    </div>
  	
  </div>
  
  <script>
  // Get the modal
  var loginModal = document.getElementById('login');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == loginModal) {
          loginModal.style.display = "none";
      }
  }
  
  // Get the modal
  var signupModal = document.getElementById('signup');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == signupModal) {
          signupModal.style.display = "none";
      }
  }
  </script>

  
  <?php 
    mysqli_close($mysql);
  ?>
    <!-- Bootstrap core JavaScript -->
    <script src="source/jquery/jquery.min.js"></script>
    <script src="source/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="source/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/index.js"></script>
    <script src="js/timer.js"></script>

  </body>

</html>
