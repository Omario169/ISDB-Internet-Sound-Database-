<?php
    
    include 'preloads/header.php';
    include_once 'includes/dbh.inc.php';
?>

<main>
      <div class="wrapper-main">
        <section class="section-default">
          
         <!-- This if statement will display a logged status depeding on if the user is logged in or not to the session.  -->
        
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
              echo "<p>".$row['username']."</p>";
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
          }
          ?>

    <!--The form is set to a POST method, and it needs the "enctype" attribute, which specifies that the content we are submitting using the form is a file-->
    <form action="upload.php" method="POST" enctype="multipart/form-data"> 
    <!--The following input is used to select the file to upload-->
    <input type="file" name="file">
    <button type="submit" name="submit"> UPLOAD</button>
    </form>
        </section>
      </div>
    </main>

  <!--Main container. Everything must be contained within a top-level container.-->
  <div class="container-fluid">

    <!--First row (only row)-->
    <div class="row extra_margin">

      <!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
      <div class="col-md-4 col-sm-12 col-xs-12">

          <!-- Div to center the header image/name/social buttons -->
          <div class="text-center">

              <!-- Placeholder image using Placeholder.com -->
              <img src="http://via.placeholder.com/300x250" class="img-rounded"/>

              <!-- Header text (Person's name) -->
              <h2>Discography Browser</h2>

              <!-- Social buttons using anchor elements and btn-primary class to style -->
              <p>
                <a class="btn btn-primary btn-xs" href="#" role="button">Facebook</a>
                <a class="btn btn-primary btn-xs" href="#" role="button">Twitter</a>
                <a class="btn btn-primary btn-xs" href="#" role="button">Instagram</a>
                <a class="btn btn-primary btn-xs" href="#" role="button">Website</a>
              </p>

          </div>

      </div> <!-- End Col 1 -->

      <!-- Second column - for small and extra-small screens, will use whatever # cols is available -->
      <div class="col-md-8 col-sm-* col-xs-*">

        <!-- "Lead" text at top of column. -->
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac purus lacus. Curabitur lobortis iaculis porta. Nullam vel condimentum dolor. Etiam tempor arcu ut urna mattis, at tristique sapien fringilla. Fusce viverra, odio sed efficitur dapibus, turpis orci posuere tellus, sed gravida dui risus at sapien. Duis faucibus non elit et interdum. Nam placerat nunc id massa placerat efficitur. Maecenas ac felis et elit vulputate posuere a non urna. Suspendisse mattis vitae nisl sed scelerisque. Duis eu risus varius, laoreet est nec, maximus dolor.</p>

        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />


        <!-- Body text (paragraph 1) -->
        <p>
          Vestibulum ac dui ut arcu pulvinar aliquet. In hac habitasse platea dictumst. Fusce porttitor at quam sit amet placerat. Phasellus placerat nunc vitae enim bibendum interdum. Nunc dapibus nisi a leo tincidunt, vitae dapibus nulla pretium. Etiam eu magna felis. Sed eleifend ligula eget augue consectetur varius. Etiam cursus ex mollis, efficitur eros non, molestie turpis. Nunc malesuada porta semper. Curabitur interdum finibus tortor at semper. Aliquam ornare ut tellus sit amet vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin risus lorem, dignissim id auctor ac, fringilla sit amet erat. In quis accumsan urna, ut ullamcorper risus. Duis id tempor libero.
        </p>

        <!-- Body text (paragraph 2) -->
        <p>
        Aenean hendrerit augue id venenatis mollis. Nunc euismod lorem id interdum tempor. Maecenas euismod euismod arcu blandit rhoncus. Aliquam mattis ornare enim, id molestie nibh dapibus eget. Donec accumsan libero ac ante lobortis, at porttitor neque pretium. Phasellus quis nibh dolor. In nunc mi, cursus quis nunc sit amet, blandit pulvinar nisi. Aenean vel egestas nisl, eu bibendum enim. Mauris ut turpis vel lacus sollicitudin ultrices eu sit amet sapien. Fusce facilisis tempus ligula, et laoreet ligula fringilla eget.
        </p>

        <!-- Body text (paragraph 3) -->
        <p>
        Nam odio leo, convallis non suscipit eu, ullamcorper a ipsum. Morbi vel porttitor arcu. Praesent sed urna consequat, eleifend nisl in, sodales lectus. Praesent diam neque, efficitur vitae euismod sodales, facilisis interdum orci. Quisque ultrices lacus id lorem feugiat auctor. Ut elementum placerat pulvinar. Donec vel nisi erat. Etiam leo dolor, scelerisque vel congue a, tempor nec mi. Vivamus fringilla non lectus non suscipit. Vestibulum iaculis turpis sit amet egestas semper. Suspendisse non ipsum nec purus laoreet venenatis. Nulla vel turpis porta, consequat arcu vitae, condimentum ante.
        </p>

        <!-- Body text (paragraph 4) -->
        <p>
        Pellentesque interdum faucibus faucibus. Donec eu mi et erat semper molestie. Donec volutpat, leo sed bibendum eleifend, nibh odio elementum urna, vel mattis ipsum est vel orci. Proin ac porta nisl, at ultrices enim. Maecenas eu nisl venenatis, accumsan odio ut, ultricies felis. Fusce eget mattis velit, id consectetur nisi. In pharetra arcu orci, ut ultricies ligula pellentesque eget. Suspendisse imperdiet libero magna, in lacinia nibh rutrum ut. Nam non augue a lorem aliquet volutpat. Vivamus vel varius dolor.</p>


      </div> <!-- End column 2 -->

    </div> <!-- End row 1 -->

  </div> <!-- End main container -->






     
   
    <!-- ##### Contact Area End ##### -->

    <?php
    include 'preloads/footer.php';
    ?>
   <?php
    include 'preloads/javascript.php';
    ?>

    
    <?php
    $album_id =  $_GET['album_id'];



    $sql = "SELECT * FROM `albums_table` WHERE `album_id` = $album_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo $row['album_name'];
      }
    }
    else {
      echo "There are no albums!";
    }












    ?>
</body>

</html>