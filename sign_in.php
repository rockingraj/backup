
 <<!--?php
    session_start();

    if( isset($_SESSION['user'])){
        header("Location: profile.php");
    }

    if( isset( $_POST["submit"] ) )
    {

        function valid($data){
            $data=trim(stripslashes(htmlspecialchars($data)));
            return $data;
        }

        $inuser = valid( $_POST["username"] );
        $inkey = valid( $_POST["password"] );

        include("connect.php");

        $query = "SELECT user_name, pass, name, join_date FROM users WHERE user_name='$inuser'";

        $result = mysqli_query( $conn, $query);
        if(mysqli_error($conn)){
            echo "<script>window.alert('Something Goes Wrong. Try Again');</script>";
        }
        else if( mysqli_num_rows($result) > 0 ){
            while( $row = mysqli_fetch_assoc($result) ){

                $user = $row['user_name'];
                $pass = $row['pass'];
                $name = $row['name'];

                $date = $row['join_date'];
            }

            if(  $inkey==$pass  ){
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $name;

                $_SESSION['date'] = $date;
                header('Location: Index.php');
            }
            else{
                echo "<script>window.alert('Wrong Username or Password Combination. Try Again');</script>";
            }
        }
        else{
            echo "<script>window.alert('No Such User exist in database');</script>";
        }
        mysqli_close($conn);
    }
?-->


<?php
    session_start();
    if( isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    if( isset( $_POST["submit"] ) )
    {
        function valid($data){
            $data=trim(stripslashes(htmlspecialchars($data)));
            return $data;
        }
        $inuser = valid( $_POST["username"] );
        $inkey = valid( $_POST["password"] );

        include("connect.php");
        $query = "SELECT user_name, pass, name, join_date FROM users WHERE user_name='$inuser'";
        $result = mysqli_query( $conn, $query);
        if(mysqli_error($conn)){
            echo "<script>window.alert('Something Goes Wrong. Try Again');</script>";
        }
        else if( mysqli_num_rows($result) > 0 ){
            while( $row = mysqli_fetch_assoc($result) ){

                $user = $row['user_name'];
                $pass = $row['pass'];
                $name = $row['name'];

                $date = $row['join_date'];
            }
            if(  $inkey==$pass  ){
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $name;

                $_SESSION['date'] = $date;
                header('Location: Index.php');
            }
            else{
                echo "<script>window.alert('Wrong Username or Password Combination. Try Again');</script>";
            }
        }
        else{
            echo "<script>window.alert('No Such User exist in database');</script>";
        }
        mysqli_close($conn);
    }
?>














<html>
	<head>
		<title>
			Schoolra
		</title>
		 <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
		<link href="Style.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  </style>
	</head>
	<body>
	<nav class="navbar navbar-default navbar-fixed-top">

  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Index.php">Schoolora</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Index.php">HOME</a></li>

         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Question
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Questions</a></li>
            <li><a href="#">Browse Questions</a></li>




          </ul>

        </li>


        <?php
                if(! isset($_SESSION['user'])){
            ?>

        <li><a href="sign_in.php">Sign In</a></li>
        <li><a href="sign_up.php">Sign Up</a></li>

         <?php
                }
                else{
            ?>
         <li><a href="#tour">Hi  <?php echo $_SESSION["user"]; ?></a></li>
        <li> <a href="#">Log out</a></li>
         <?php
                }
            ?>
        <li><a href="#" style="margin-top:4px"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>



		 <!-- content -->
        <div >
            <center>
                <div class="heading">
                    <h1 class="logo"><div id="i"></div><div id="ntro">Schoolora</div></h1>
                    <p id="tag-line"></p>
                </div>
                <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" >
                    <input name="username" id="user" type="text" title="Username" placeholder="Username" required>
                    <input name="password" id="key" type="password" title="Password" placeholder="Password" required>
                    <i class="material-icons" id="lock">lock</i>
                    <i class="material-icons" id="person">person</i>
                    <div id="button-block">
                        <center>
                            <div class="buttons"><input name="submit" type="submit" value="Log In" class="up-in"></div>
                            <div class="buttons" id="new"><input type="button" value="Create a new account" class="up-in" id="tosign"></div>
                        </center>
                    </div>

                </form>
            </center>
        </div>
        <!-- Footer -->
<div class="footer" style="position: fixed;
	left: 0;
	border: 0;
	width: 100%;
	float:bottom;
	margin-top:650px;">
<footer class="footer">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" >© 2018
    <a href="Index.php"> Schoolora</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</div>
         <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>

	</body>
</html>
