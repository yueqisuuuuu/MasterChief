<?php
	session_start();
	$uid = $_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FALL 2017 OMIS 120 Final Project">
    <meta name="author" content="Yueqi Su">

    <title>Master Chief</title>

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
    <link href="css/index.css" rel="stylesheet">

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

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <h1>Welcome To Master Chief</h1>
          <br>
          <a class="btn btn-primary btn-xl text-uppercase" href="search.php?cat=none&cui=none&lev=none&rate=none&sort=none">Explore Recipe</a>
        </div>
      </div>
    </header>

    <!-- About -->
    <section class="bg-light" id="about">
      <div class="container">
        <div class="row text-right">
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <h2 class="section-heading">About Us</h2>
            <p class="text-muted">Master Chief is designed for recipes lovers and food enthusiasts. Lorem ipsum dolor sit amet, blandit justo placerat litora orci ullamcorper, leo ac consectetuer elit ornare. Est nullam ac libero, arcu odio ea nisl quis consectetuer, ultrices ultricies sed et magna vestibulum pharetra, venenatis ipsum. Aliquam leo lobortis purus molestie per et, hymenaeos aliquet purus aliquam faucibus mollis, tempus phasellus, amet litora, sem massa. </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Explore -->
    <section id="explore">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Explore</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <img class="img-fluid" src="img/explore/seafood.jpeg" alt="seafood">
            <div class="explore-caption">
              <a href="search.php?cat=seafood&cui=none&lev=none&rate=none&sort=none"><h4>Seafood</h4></a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <img class="img-fluid" src="img/explore/chicken.jpeg" alt="chicken">
            <div class="explore-caption">
              <a href="search.php?cat=chicken&cui=none&lev=none&rate=none&sort=none"><h4>Chicken</h4></a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <img class="img-fluid" src="img/explore/beef.jpeg" alt="beef">
            <div class="explore-caption">
              <a href="search.php?cat=beef&cui=none&lev=none&rate=none&sort=none"><h4>Beef</h4></a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <img class="img-fluid" src="img/explore/salad.jpeg" alt="salad">
            <div class="explore-caption">
              <a href="search.php?cat=vege&cui=none&lev=none&rate=none&sort=none"><h4>Vegetarian</h4></a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <img class="img-fluid" src="img/explore/dessert.jpeg" alt="dessert">
            <div class="explore-caption">
              <a href="search.php?cat=snack&cui=none&lev=none&rate=none&sort=none"><h4>Dessert/Snack</h4></a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <img class="img-fluid" src="img/explore/smoothie.jpeg" alt="smoothie">
            <div class="explore-caption">
              <a href="search.php?cat=smoothie&cui=none&lev=none&rate=none&sort=none"><h4>Smoothie</h4></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section class="bg-light" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Contact Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Name *" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Email *" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Phone *" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Leave a Message *" required></textarea>
                  </div>
                </div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
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

    <!-- Bootstrap core JavaScript -->
    <script src="source/jquery/jquery.min.js"></script>
    <script src="source/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="source/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/index.js"></script>

  </body>

</html>
