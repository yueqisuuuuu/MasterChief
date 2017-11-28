<?php 
	session_start();
	$uid = $_SESSION['uid'];
	
  $servername = getenv('IP');
  $username = getenv('C9_USER');
  $password = "";
  $database = "c9";

  $mysql = mysqli_connect($servername, $username, $password, $database);
  $cat=$_GET["cat"];
  $cui=$_GET["cui"];
  $lev=$_GET["lev"];
  $sort=$_GET["sort"];
  
  $select="SELECT * FROM recipe";
  $where="";
  if ($cat != "none" || $cui != "none" || $lev != "none"){
    if ($cat != "none"){
      $where .= " recipeCat=\"$cat\"";
    }
    if ($cui != "none"){
      if (!empty($where)){
        $where .= " AND";
      }
      $where .= " recipeCui=\"$cui\"";
    }
    if ($lev != "none"){
      if (!empty($where)){
        $where .= " AND";
      }
      $where .= " recipeSkill=\"$lev\"";
    }
    
    $where = " WHERE$where";
  }
  $order="";
  if ($sort == "pop"){
    $order .=" ORDER BY recipeCount DESC";
  }
  else if($sort == "skill-h"){
    $order .=" ORDER BY recipeSkill DESC";
  }
  else if($sort=="skill-l"){
    $order .=" ORDER BY recipeSkill ASC";
  }
  
  $sql = $select.$where.$order;
  $result = mysqli_query($mysql,$sql);
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
    <link href="css/search.css" rel="stylesheet">
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
    <section id="recipe-search">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Explore Recipe</h2>
          </div>
        </div>
        <div id="search-area">
          <form id="search" action="search.php" method="get">
            <div class="row" id="search-form">
              <div class="search-item col-lg-4">
                <h6>Recipe Category</h6>
                <select name="cat">
                  <option value="none">Choose Category</option>
                  <option value="beef" <?php if ($cat=="beef") {echo "selected='selected'"; } ?> >Beef</option>
                  <option value="chicken" <?php if ($cat=="chicken") {echo "selected='selected'"; } ?> >Chicken</option>
                  <option value="seafood" <?php if ($cat=="seafood") {echo "selected='selected'"; } ?> >Seafood</option>
                  <option value="pork" <?php if ($cat=="pork") {echo "selected='selected'"; } ?> >Pork</option>
                  <option value="soup" <?php if ($cat=="soup") {echo "selected='selected'"; } ?> >Soup</option>
                  <option value="snack" <?php if ($cat=="snack") {echo "selected='selected'"; } ?> >Dessert/Snack</option>
                  <option value="vege" <?php if ($cat=="vege") {echo "selected='selected'"; } ?> >Vegetarian</option>
                  <option value="smoothie" <?php if ($cat=="smoothie") {echo "selected='selected'"; } ?> >Smoothie</option>
                </select>
              </div>
              <div class="search-item col-lg-4">
                <h6>Cuisine</h6>
                <select name="cui">
                  <option value="none">Choose Cuisine</option>
                  <option value="american" <?php if ($cui=="american") {echo "selected='selected'"; } ?> >American</option>
                  <option value="chinese" <?php if ($cui=="chinese") {echo "selected='selected'"; } ?> >Chinese</option>
                  <option value="indian" <?php if ($cui=="indian") {echo "selected='selected'"; } ?> >Indian</option>
                  <option value="italian" <?php if ($cui=="italian") {echo "selected='selected'"; } ?> >Italian</option>
                  <option value="japanese" <?php if ($cui=="japanese") {echo "selected='selected'"; } ?> >Japanese</option>
                  <option value="mexican" <?php if ($cui=="mexican") {echo "selected='selected'"; } ?> >Mexican</option>
                </select>
              </div>
              <div class="search-item col-lg-4"></div>
              <div class="search-item col-lg-4">
                <h6>Skill Level</h6>
                <select name="lev">
                  <option value="none">Choose Level</option>
                  <option value="easy" <?php if ($lev=="easy") {echo "selected='selected'"; } ?> >Easy</option>
                  <option value="inter" <?php if ($lev=="inter") {echo "selected='selected'"; } ?> >Intermediate</option>
                  <option value="hard" <?php if ($lev=="hard") {echo "selected='selected'"; } ?> >Hard</option>
                </select>
              </div>
              <div class="search-item col-lg-4">
                <h6>Sort By</h6>
                <select name="sort">
                  <option value="none">Default</option>
                  <option value="pop" <?php if ($sort=="pop") {echo "selected='selected'"; } ?> >Popularity</option>
                  <option value="skill-h" <?php if ($sort=="skill-h") {echo "selected='selected'"; } ?> >Skill Level (High to Low)</option>
                  <option value="skill-l" <?php if ($sort=="skill-l") {echo "selected='selected'"; } ?> >Skill Level (Low to High)</option>
                </select>
              </div>
              <div class="search-item col-lg-4">
                <button type="submit" class="btn">Search</button>
              </div>
            </div>
          </form>
          <hr>
          <div id="result" class="row">
          <?php
            while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){ 
          ?>
            <div class="col-md-4 col-sm-6 result-item">
              <img class="img-fluid" src="<?=$row['recipeImg']?>" alt="<?=$row['recipeName']?>">
              <div class="result-caption">
                <a href="recipe.php?recipeID=<?=$row['recipeID']?>"><h5 class="recipe-title"><?=$row['recipeName']?></h5></a>
                <div class="row">
                  <div class="col-md-6 col-lg-6 caption-left">
                    <i class="fa fa-clock-o"></i>
                    <span class="recipe-hour"><?=$row['recipeHour']?></span>
                  </div>
                  <div class="col-md-6 col-lg-6 caption-right">
                    <span class="recipe-rating"><?=$row['recipeCount']?> Saved</span>
                  </div>
                </div>
              </div>
            </div>
          <?php
            }
          ?>
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
  
  <script>
  // Get the login modal
  var loginModal = document.getElementById('login');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == loginModal) {
          loginModal.style.display = "none";
      }
  }
  
  // Get the signup modal
  var signupModal = document.getElementById('signup');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == signupModal) {
          signupModal.style.display = "none";
      }
  }
  
  function SelectElement()
{    
    var element = document.getElementById('leaveCode');
    element.value = valueToSelect;
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

  </body>

</html>
