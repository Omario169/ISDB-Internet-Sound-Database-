<?php
    session_start();
    include_once 'includes/dbh.inc.php';
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>ISDB - Internet Sound Database</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
   
   

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area>
    
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt="ISDB logo"></a>
                        

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="albums-store.html">Albums</a></li>
                                    <li><a href="#">My lists</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Albums To Listen To</a></li>
                                            <li><a href="albums-store.html">Podcasts to listen to</a></li>
                                            <li><a href="event.html">Shopping List</a></li>
                                         
                                           
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="#">Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a>
                                                        <ul class="dropdown">
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="event.html">Podcasts</a></li>
                                    <li><a href="blog.html">News</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                    <!-- The following php code will display the log in form when the user is logged out. The log out button will subsequently be displayed if the user is logged in. -->
                                    <?php
                                        if (!isset($_SESSION['id'])) {
                                            echo '<form action="includes/login.inc.php" method="post">
                                            <input type="text" name="mailuid" placeholder="E-mail/Username">
                                            <input type="password" name="pwd" placeholder="Password">
                                            <button type="submit" name="login-submit">Login</button>
                                            </form>
                                            <a href="register.php" class="header-signup">Signup</a>';
                                            }
                                            else if (isset($_SESSION['id'])) {
                                            echo '<form action="includes/logout.inc.php" method="post">
                                            <button type="submit" name="login-submit">Logout</button>
                                            </form>';
                                            }
                                            ?>
                                   </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

   <!-- ##### Header Area End ##### -->
      <!-- ##### User Area start  ##### -->
<div>
      <?php
      //Here we display all users who are registered in the database
      //First we get the users one by one
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['idUsers'];
          //Then we get their profile image information from the database
          $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
          
           $resultImg = mysqli_query($conn, $sqlImg);
          while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            //We then display the user and their profile image
            echo "<div>";
              //If the user has uploaded a profile image, then we show it here
              if ($rowImg['status'] == 0) {
                echo "<img src='uploads/profile".$id.".jpg'>";
              }
              //If the user has not uploaded a profile image, then we show a default placeholder image
              //The placeholder image we should place in the uploads folder
              else {
                echo "<img src='uploads/profiledefault.jpg'>";
              }
              //We also display their username
              echo "<p>".$row['uidUsers']."</p>";
            echo "</div>";
          }
        }
      }
      else {
        echo "There are no users!";
      }

         if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged out!</p>';
          }
          else if (isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged in!</p>';
            echo '<form action="upload.php" method="POST" enctype="multipart/form-data"> 
            <!--The following input is used to select the file to upload-->
              <input type="file" name="file">
              <button type="submit" name="submit"> UPLOAD</button>
              </form>';
          }
          ?>
</div>
  

   <!-- <li><a href="login.php" id="loginBtn">Logout</a></li> -->