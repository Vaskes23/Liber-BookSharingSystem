<?php
session_start();
$_SESSION;

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
    <link rel="stylesheet" href="css/movies_shows.css" />
    <script src="https://kit.fontawesome.com/1bd0155df1.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="content">
        <div id="branding">
            <h1><a href="homePage.php">VMDB</a></h1>
        </div>
        <nav>
            <ul>
                <li>
                    <section id="newsletter">
                        <form method="POST" >
                            <input type="TEXT" name="searchBar" placeholder="Search it" />

                            <input type="submit" name="search"  value="SEARCH" class="button_1"></input>
                        </form>
                        <?php
                        if(isset($_POST['search'])){ //ziska input ze searchbaru
                            $_SESSION['searchBar'] = $_POST['searchBar'];
                            header($_SESSION['searchLocation']);
                            exit();
                        }
                        ?>

                    </section>
                </li>

                <li><a href="shows.php">TV SHOWS</a></li>
                <li><a href="movies.php">MOVIES</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="watchlist.php">WATCHLIST </a></li>
                <?php if( $_SESSION['user_logged_in']==true): ?>
                    <li><button  class="button_signIn"><a href="login.php">LOG OUT</a></button></li>
                <?php else: ?>
                    <li><button  class="button_signIn"><a href="signIn.php">SIGN IN</a></button></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<div class="content">



    <h1>OUR SHOWS ></h1>

    <div class="addMovie">
        <form method="POST" action="shows.php" enctype="multipart/form-data">
            <table>
                <input type="hidden" name="size" value="1000000">
                <tr>
                    <td>
                        <select id="rating" name="genres">
                            <option value="0">ALL</option>
                            <option value="action">ACTION</option>
                            <option value="comedy">COMEDY</option>
                            <option value="drama">DRAMA</option>
                            <option value="horror">HORROR</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="SUBMIT"  name="genresSubmit" value="SHOW" required/></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="movies">
        <section id="carouselMovies">
            <?php
            function showsGenre(){
            $dbMovies =  mysqli_connect('localhost','admin','penis','vascakmatyas_movies');
            $genres = $_POST['genres'];
                                                                                                                                                    //vypise serialy kterre jsou v zadanem zanru

            if($genres == '0' OR $genres == null){
                $sql = "SELECT * FROM movies WHERE category = 1";                                                    //vypise serialy ktere jsou v zadanem kategorii
            }else{
                $sql = "SELECT * FROM movies WHERE category = 1 AND genre = '$genres'";                             //vypise serialy kterre jsou v zadanem zanru
            }
            $result = mysqli_query($dbMovies, $sql);
            while ($row = mysqli_fetch_array($result)){
                //vygeneruje jejich html
                echo"<div class='imgDiv'>";
                echo"<img src='img/".$row['image']."'>";
                echo"<h2>".$row['name']."</h2>";
                echo "<p>".$row['text']."</p>";

                echo"<button  class='button_moreInfo'><a href=info.php?id=".$row['id']."><i class='fa fa-info'></i></a></button>";

                echo"<button  class='button_moreInfo'><a href=watched.php?id=".$row['id']."><i class='fa fa-check'></i></a></button>";
                echo"<button  class='button_moreInfo'><a href=watchlist.php?id=".$row['id']."><i class='fa fa-bookmark'></i></a></button>";
                echo"</div>";
            }
        }
        showsGenre();
            ?>
        </section>
    </div>



    <h1>FAMOUS DIRECTORS ></h1>
    <section id="carouselMoviesDirector">
        <?php
$obj = new DirectorsCarousell();
$obj->famousDirectors();
        ?>
    </section>


</div>

<div class="message">
    <div class="content">
        <h1> Send us some ideas, if you want</h1>
        <button><a href=contact.php>CONTACT</a></button>

    </div>
</div>


<footer>
    <div class="content">

        <nav>
            <ul>
                <li><a href="shows.php">TV SHOWS</a></li>
                <li><a href="movies.php">MOVIES</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="watchlist.php">WATCHLIST </a></li>
            </ul>
        </nav>
        <br>
        <p style="margin: 0px;">copyright &copy; 2021</p>
    </div>
</footer>
</body>
</html>

