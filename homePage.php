<?php
session_start();
$_SESSION;

//$_SESSION['posted'] = false;
$_SESSION['searchLocation'] = "Location:search.php";

//error_reporting( E_ALL );
//ini_set( "display_errors", 1 );

include 'newMovie.php';
include 'movieDirectorsCarousel.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Matyáš Vaščák" />
    <meta name="robots" content="all" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/favicon.png" rel="shortcut icon" type="image/png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/homePageStyle.css" />
    <script src="https://kit.fontawesome.com/1bd0155df1.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="content">
        <div id="branding">
            <div class="liberVelky"><h1><a href="homePage.php">LIBER</a></h1></div>
            <div class="liber2"><h1><a href="homePage.php">L</a></h1></div>
        </div>
        <nav>
            <ul>
                <li>
                    <section id="newsletter">
                        <form method="POST" >
                            <input type="TEXT" name="searchBar" placeholder="ZAČNĚTE HLEDAT" />

                            <input type="submit" name="search"  value="Hledat" class="button_1"><i class='fa fa-check'></i></input>
                        </form>
                        <?php
                        if(isset($_POST['search'])){                                                //ziska input ze searchbaru
                            $_SESSION['searchBar'] = $_POST['searchBar'];
                            header($_SESSION['searchLocation']);
                            exit();
                        }
                        ?>


                    </section>
                </li>
                <div class="knihovnikVelky">
                <li><a href="knihovnik.php">Buďte knihovník</a></li>
                </div>

                <div class="dropdown">
                    <button class="dropbtn"><i class='fa fa-bars'></i></button>
                    <div class="dropdown-content">

                        <li><a href="shows.php">Účet</a></li>
                        <li><a href="movies.php">Knihy</a></li>
                        <li><a href="contact.php">Kluby</a></li>
                        <li><a href="watchlist.php">Wishlist</a></li>
                        <li><a href="contact.php">Pomoc</a></li>
                        <div class="knihovnik2"> <li><a href="knihovnik.php">Knihovník</a></li></div>

                        <?php if( $_SESSION['user_logged_in']==true): ?>
                            <li><button  class="button_signIn"><a href="login.php">ODHLÁSIT</a></button></li>
                        <?php else: ?>
                            <li><button  class="button_signIn"><a href="signIn.php">PŘIHLÁSIT</a></button></li>
                        <?php endif; ?>

                    </div>
                </div>


            </ul>
        </nav>
    </div>
</header>

<?php if( $_SESSION['user_logged_in']==false):?>
<div class ="join">
    <div class="content">
            <div class ="joinBoxes">
                <a href="signIn.php">
                    <div class = "profile">
                        <h1>založte si profil</h1><i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </a>
                <a href="login.php">
                <div class = "community">
                    <h1>připojte se do komunity</h1> <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                </a>
            </div>
        </div>
</div>
<?php endif; ?>

<div class="content">
    <!--
        <div class ="welcomePanel">
        <div class ="carousel-container">
            <i class="fas fa-angle-left" id="prevBtn"></i>
            <i class="fas fa-angle-right" id="nextBtn"></i>
            <div class="carousel-slide">

                <a href="klauzury.vascak.com/info.php?id=71">
                    <?php
                     //echo $_SERVER['SERVER_NAME'];
                    // echo parse_url("https://'.$_SERVER['HTTP_HOST'].'/verify");

                    ?>
                    <img src="http://localhost:8090/MProjetkCode/carouselImg/carouselImg1.jpg" id="lastClone">
                </a>
                <a href="http://klauzury.vascak.com/info.php?id=74">
                    <img src="http://localhost:8090/MProjetkCode/carouselImg/carouselImg2.jpg">
                </a>
                <a href="http://klauzury.vascak.com/info.php?id=73">
                    <img src="http://localhost:8090/MProjetkCode/carouselImg/carouselImg3.jpg">
                </a>
                <a href="http://klauzury.vascak.com/info.php?id=72">
                    <img src="http://localhost:8090/MProjetkCode/carouselImg/carouselImg4.jpg">
                </a>
                <a href="http://klauzury.vascak.com/info.php?id=71">
                    <img src="http://localhost:8090/MProjetkCode/carouselImg/carouselImg1.jpg" id="firstClone">
                </a>
            </div>
        </div>
        <script src="banner.js"></script>
        !-->

        <?php
        $obj = new DirectorsCarousell();
        //$obj->watchAgain();
        ?>
        </div>



<!--
        <?php if( $_SESSION['user_admin'] == true): ?>
            <h1>ADD A MOVIE ></h1>
            <div class="addMovie">
            <form method="POST" action="homePage.php" enctype="multipart/form-data">
                <table>
                    <input type="hidden" name="size" value="1000000">
                    <tr>
                        <td align="left">Title:</td>
                    </tr>
                    <tr>
                        <td><input type="TEXT" name="name" maxlength="15" required/></td>
                    </tr>
                    <tr>
                        <td align="left">Text:</td>
                    </tr>
                    <tr>
                        <td><input type="TEXT" name="text" maxlength="44" required/></td>
                    </tr>
                    <tr>
                        <td align="left">Director:</td>
                    </tr>
                    <tr>
                        <td><input type="TEXT" name="director" maxlength="44" required/></td>
                    </tr>
                    <tr>
                        <td align="left">Descritpion:</td>
                    </tr>
                    <tr>
                        <td><textarea type="TEXT" name="description" maxlength="300" rows="10"  required></textarea></td>
                    </tr>
                    <tr>
                        <td align="left">Trailer link:</td>
                    </tr>
                    <tr>
                        <td><input type="TEXT" name="link" required/></td>
                    </tr>
                    <tr>
                        <td align="left">Category:</td>
                    </tr>

                    <tr>
                        <td>
                            <select id="category" name="category">
                                <option value="0" selected>Movie</option>
                                <option value="1">Series</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td align="left">Genre:</td>
                    </tr>
                    <tr>
                        <td>
                            <select id="genre" name="genre">
                                <option value="action">Action</option>
                                <option value="comedy">Comedy</option>
                                <option value="drama">Drama</option>
                                <option value="horror">Horror</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td align="left">Poster:</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="file" id="imageFile" name="image" size="600">
                            <label for="imageFile"> CHOOSE IMAGE</label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center"><input type="SUBMIT" name="upload" value="UPLOAD" required/></td>
                    </tr>
                </table>
            </form>
        </div>






            <h1>ADD A DIRECTOR ></h1>
            <div class="addMovie">
                <form method="POST" action="homePage.php" enctype="multipart/form-data">
                    <table>
                        <input type="hidden" name="size" value="1000000">
                        <tr>
                            <td align="left">Name:</td>
                        </tr>
                        <tr>
                            <td><input type="TEXT" name="director" maxlength="25" required/></td>
                        </tr>
                        <tr>
                            <td align="left">Text:</td>
                        </tr>
                        <tr>
                            <td><input type="TEXT" name="textDirector" maxlength="44" required/></td>
                        </tr>

                        <tr>
                            <td align="left">Descritpion:</td>
                        </tr>
                        <tr>
                            <td><textarea type="TEXT" name="descriptionDirector" maxlength="349" rows="10"  required></textarea></td>
                        </tr>
                        <tr>
                            <td align="left">Image:</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" id="imageFile2" name="imageDirector" size="600">
                                <label for="imageFile2"> CHOOSE IMAGE</label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center"><input type="SUBMIT" name="uploadDirector" value="UPLOAD" required/></td>
                        </tr>
                    </table>
                </form>
            </div>
        <?php else: ?>

        <?php endif; ?>
        !-->
<div class="content">

        <h1>Oblíbené žánry </h1>
            <div class="favGenres">
                <div class ="horor">
                    <a href="">
                    <img src="http://localhost:8090/MProjetkCode/carouselImg/horor.png"></a>
                    <a href="">
                    <h2>Horory
                    <div class="smallText">Chcete se bát?</div>
                    </h2></a>
                </div>

                <div class ="romance">
                    <a href=""><img src="http://localhost:8090/MProjetkCode/carouselImg/Mromance.png"></a>
                    <a href="">
                    <h2>Romantika
                        <div class="smallText">Zažijte lásku</div>
                    </h2></a>
                </div>

                <div class ="comedy">
                    <a href=""><img src="http://localhost:8090/MProjetkCode/carouselImg/Mromance.png"></a>
                    <a href="">
                    <h2>Komedie
                        <div class="smallText">Chcete se smát?</div>
                    </h2></a>
                </div>

                <div class ="noir">
                    <a href=""><img src="http://localhost:8090/MProjetkCode/carouselImg/Mromance.png"></a>
                    <a href=""><h2>Drama
                        <div class="smallText">Zažijte napětí</div>
                    </h2></a>
                </div>


            </div>



        <h1>Vaše knihy</h1>
        <section id="carouselMovies">
        <?php
        $obj = new DirectorsCarousell();
        $obj->newlyAdded();
        ?>
        </section>

    <!--
        <h1>CRITICALLY ACLAIMED ></h1>
        <section id="carouselMovies">
        <?php
        //$obj = new DirectorsCarousell();
        //$obj->aclaimed();
        ?>
        </section>


        <h1>SOON IN THEATERS ></h1>
        <div class="trailerPrewiew">
            <iframe width="464" height="261" src="https://www.youtube.com/embed/0H2cIbUGJJc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="464" height="261" src="https://www.youtube.com/embed/L6IilhSDVuA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>


        <h1>FAMOUS DIRECTORS ></h1>
        <section id="carouselMoviesDirector">
            <?php
           //$obj = new DirectorsCarousell();
           //$obj->famousDirectors();
            ?>
        </section>!-->


    <section id="questions">
        <h1>máte <br>
        otázky?</h1>
        <button><a href="contact.php">zkus mě</a> </button>
    </section>

        </div>


    </div>




<footer>
    <div class="content">

    <nav>
        <ul>
            <div class="column1">
            <li><a href="shows.php">Účet</a></li>
            <li><a href="movies.php">Knihy</a></li>
            <li><a href="contact.php">Kluby</a></li>
            </div>
            <div class="column2">
            <li><a href="watchlist.php">Wishlist</a></li>
            <li><a href="contact.php">Pomoc</a></li>
            <li><a href="knihovnik.php">Knihovník</a></li>
            </div>
        </ul>
    </nav>
        <br>
        <p style="margin: 0px;">copyright &copy; 2022</p>
    </div>
</footer>
</body>
</html>