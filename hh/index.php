

<html lang="en" class="default-theme">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .checked {
  color: orange;
}
      * {box-sizing: border-box}
      body {font-family: Verdana, sans-serif; margin:0}
      .mySlides {display: none}
      img {vertical-align: middle;
      }

      /* Slideshow container */
      .slideshow-container {
        width: 100%;


      box-shadow: 1px 2px 2px white;
        position: relative;
        margin: auto;
        background-size: 100% 100%;
      }

      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }

      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
      }

      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }

      .active, .dot:hover {
        background-color: #717171;
      }

      /* Fading animation */
      .fade {
        animation-name: fade;
        animation-duration: 1.5s;
      }

      @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
      }

      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
      }
      </style>
    <title>DO IT-review site</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

    <header>


      <nav class="topnav">
        <img
      class="logo"
      src="images/logo3.png"
      alt="restaurants logo"
    />


        <div class="links">
          <a href="index.php">HOME</a>
          <a href="#about">About-US</a>
          <a href="#footer">Contact-Us</a>
        </div>

      </nav>
    </header>

    <div class="slideshow-container">

      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="images/image7.jpg" style="width:100%">

      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="images/doimg.jpg" style="width:100%">
      </div>
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="images/image20.jpg" style="width:100%">

      </div>



      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>
      <a class="next" onclick="plusSlides(2)">❯</a>

      </div>
      <br>

      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>

      </div>

      <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 4000); // Change image every 4 seconds
        }
        </script>


    <main>
      <div class="main">




        <hr>
        <br>
        <div id="myBtnContainer">
<form method="POST">
  <h2 style="color:#6D089D">Search in Riyadh: </h2> <br>
          <input class="btn active" type="submit" name="all" value="Show all"/>
          <input class="btn" type="submit" name="north" value="north"/>
          <input class="btn" type="submit" name="south" value="shoth"/>
         <input class="btn" type="submit" name="west" value="west"/>
         <input class="btn" type="submit" name="east" value="east"/>

 <a class="sort btn active"  href="?Top_Rated=1">Top Rated</a>
        </form>


        </div>
        <br>
        <hr>

        <!-- Portfolio Gallery Grid -->
<div class="row">
        <?php
                global $db;
                $server = 'localhost';
                $user = 'root';
                $pass = 'root';
                $dbname = 'doit';
                $db = mysqli_connect($server,$user,$pass,$dbname);
                if(!$db) {
                  exit("connection string failed");
                }
                    $q ='select * from gym_info WHERE loc="north"';
                $run = mysqli_query($db, $q);
                if(isset($_POST['north'])){
                while($rec = mysqli_fetch_array($run)) {

                echo
                '
                  <div class="column">
                <div class="content">
                <form method ="get">
                            <img src='.$rec["photo"].' alt="" style="width:100%"><hr>
                            <p class="table-name">'.$rec["name"].' </p>

                      <p class="table-loc">LOCATION: "'.$rec["loc"].'"</p><br>
                <a href="gym_information.php?id='.$rec['id'].'">veiw details</a>

                            </form>
                </div></div>';}}
                ?>

                <?php
                global $db;
                $server = 'localhost';
                $user = 'root';
                $pass = 'root';
                $dbname = 'doit';
                $db = mysqli_connect($server,$user,$pass,$dbname);
                if(!$db) {
                  exit("connection string failed");
                }
                    $q ='select * from gym_info WHERE loc="south"';
                $run = mysqli_query($db, $q);
                if(isset($_POST['south'])){
                while($rec = mysqli_fetch_array($run)) {

                echo
                '
                  <div class="column">
                <div class="content">
                <form method ="get">
                            <img src='.$rec["photo"].' alt="" style="width:100%"><hr>
                            <p class="table-name">'.$rec["name"].' </p>

                      <p class="table-loc">LOCATION: "'.$rec["loc"].'"</p><br>
                <a href="gym_information.php?id='.$rec['id'].'">veiw details</a>

                            </form>
                </div></div>';}}
                ?>

                <?php
                global $db;
                $server = 'localhost';
                $user = 'root';
                $pass = 'root';
                $dbname = 'doit';
                $db = mysqli_connect($server,$user,$pass,$dbname);
                if(!$db) {
                  exit("connection string failed");
                }
                    $q ='select * from gym_info WHERE loc="west"';
                $run = mysqli_query($db, $q);
                if(isset($_POST['west'])){
                while($rec = mysqli_fetch_array($run)) {

                echo
                '
                  <div class="column">
                <div class="content">
                <form method ="get">
                            <img src='.$rec["photo"].' alt="" style="width:100%"><hr>
                            <p class="table-name">'.$rec["name"].' </p>

                      <p class="table-loc">LOCATION: "'.$rec["loc"].'"</p><br>
                <a href="gym_information.php?id='.$rec['id'].'">veiw details</a>

                            </form>
                </div></div>';}}
                ?>

                <?php
                global $db;
                $server = 'localhost';
                $user = 'root';
                $pass = 'root';
                $dbname = 'doit';
                $db = mysqli_connect($server,$user,$pass,$dbname);
                if(!$db) {
                  exit("connection string failed");
                }
                    $q ='select * from gym_info WHERE loc="east"';
                $run = mysqli_query($db, $q);
                if(isset($_POST['east'])){
                while($rec = mysqli_fetch_array($run)) {

                echo
                '
                  <div class="column">
                <div class="content">
                <form method ="get">
                            <img src='.$rec["photo"].' alt="" style="width:100%"><hr>
                            <p class="table-name">'.$rec["name"].' </p>

                      <p class="table-loc">LOCATION: "'.$rec["loc"].'"</p><br>
                <a href="gym_information.php?id='.$rec['id'].'">veiw details</a>

                            </form>
                </div></div>';}}
                ?>
              </div>

<div class="row">
            <?php

            global $db;
          	$server = 'localhost';
          	$user = 'root';
          	$pass = 'root';
          	$dbname = 'doit';
          	$db = mysqli_connect($server,$user,$pass,$dbname);
          	if(!$db) {
          		exit("connection string failed");
          	}
			if(isset($_GET['Top_Rated'])){
				$orderBy = $_GET['Top_Rated'];
			}
			if(isset($orderBy) && $orderBy == 1){
				$q = "SELECT * FROM `gym_info` p ORDER BY (SELECT AVG(user_rating) AS avg_rating FROM rev WHERE gym_id = p.id) DESC";
			}else {
				$q ='select * from gym_info';
			}

          $run = mysqli_query($db, $q);

            while($rec = mysqli_fetch_array($run)) {

echo
'
 <div class="column">
        <div class="content">
        <form method ="get">
                    <img src='.$rec["photo"].' alt="" style="width:100%"><hr>
                    <p class="table-name">'.$rec["name"].' </p>
                         ';
             $gym_id = $rec['id'];
                    $query1 = "SELECT Avg(user_rating) as sum1 FROM rev WHERE gym_id=$gym_id group by gym_id";

                    $result1 = mysqli_query($db, $query1);
                    $row1 = mysqli_fetch_array($result1);

                $returned = $row1['sum1'];
                $avg = 0;
                if($returned == NULL) {
                    $avg = 0;
                } else {
                    $avg = $returned;
                }
                //echo "<p>returned 6: " . $avg . "</p>";
                ?>
       <h2> Rating: <?php echo $avg ?></h2>



        <?php


                    if($avg == 0) {
                        echo '<i class="fa fa-star"></i><span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
          <span class="fa fa-star"></span>';
                    } elseif($avg == 1) {
                        echo '<i class="fa fa-star checked"></i><span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
          <span class="fa fa-star"></span>';
                    } else if( $avg == 2) {
                        echo '<i class="fa fa-star checked"></i><span class="fa fa-star checked"></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
          <span class="fa fa-star"></span>';
                    }else if( $avg == 3) {
                        echo '<i class="fa fa-star checked"></i><span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star "></span>
          <span class="fa fa-star"></span>';
                    }else if( $avg == 4) {
                        echo '<i class="fa fa-star checked"></i><span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>';
                    }else if( $avg == 5) {
                         echo '<i class="fa fa-star checked"></i><span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>';
                    }

                  ?>

    <?php

            echo '
              <p class="table-loc">LOCATION: "'.$rec["loc"].'"</p><br>
        <a href="gym_information.php?id='.$rec['id'].'">veiw details</a>

                    </form>
        </div></div>';

    }

?>
</div>
        <!-- END GRID -->
        </div>

        <!-- END MAIN -->

        <script>
          filterSelection("all")
          function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("column");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
              w3RemoveClass(x[i], "show");
              if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
          }

          function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
              if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
            }
          }

          function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
              while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
              }
            }
            element.className = arr1.join(" ");
          }


          // Add active class to the current button (highlight it)
          var btnContainer = document.getElementById("myBtnContainer");
          var btns = btnContainer.getElementsByClassName("btn");
          for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function(){
              var current = document.getElementsByClassName("active");
              current[0].className = current[0].className.replace(" active", "");
              this.className += " active";
            });
          }
        </script>

<br> <br> <br>
<div id="about">
      <div class="container">

        <div class="left">
          <img src="images/banner.png">
        </div>
        <div class="right">
          <h2 class="about">About Us</h2>
          <p>we are</p>
        <h1> DO IT review-site</h1>
        <p>we provide gyms with options that depend on your needs.
          we will save your valuable time and help you find better options. .</p>

        </div>
      </div>



    </main>






    <footer id="footer">

        <div class="footer-content">
          <h3>Contact Us</h3>
          <p> Feel free to contact us if you encounter any problems, whether it's a technical malfunction or confusion about the displayed information</p>
          <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
         </ul>
         <div class="footer-bottom">
          <button style="color: black;" onclick="window.location.href='signuplogin.html'">admin</button>
          <p>copyright &copy;2022 <a href="#">DO IT</a>  </p>

       </div>
        </div>

    </footer>
  </body>

</html>
