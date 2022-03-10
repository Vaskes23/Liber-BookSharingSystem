<?php
session_start();
$_SESSION;

//error_reporting( E_ALL );
//ini_set( "display_errors", 1 );

include 'watchedWatchlistCode.php';

$obj = new watchedWatchlistLists();
        $obj->addToWatchlist();

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
    <link rel="stylesheet" href="css/watchlist_watched.css" />
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


    <?php if( $_SESSION['user_logged_in'] == true): ?>
    <h1>YOUR WATCHLIST ></h1>
    <div class="movies">
        <section id="carouselMovies">
            <?php
        $obj = new watchedWatchlistLists();
        $obj->generateWatchlist();
            ?>
        </section>
    </div>

    <?php else: ?>
    <div class="login">
    <h1>YOU ARE NOT LOGGED IN</h1>
    </div>
    <?php endif; ?>



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

