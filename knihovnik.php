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
    <link rel="stylesheet" href="css/knihovnik.css" />
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


<div class="howToUpload">
    <div class="content">
    <h2>Jak sdílet svou knihu?</h2>

    <h1>Jak sdílet svou knihu rychle a bezpečně?</h1>
    <h1>Podívejte se na naše rady.</h1>

        <button class="moreInformation"><a href="whatToDo.php">Zjistit více</a></button>
    </div>
</div>


<div class="content">
    <?php if( $_SESSION['user_logged_in']==true):?>

    <div class="newBook">
            <h1>Napište informace</h1>
            <div class="addMovie">
            <form method="POST" action="homePage.php" enctype="multipart/form-data">
                <table>
                    <input type="hidden" name="size" value="1000000">
                    <tr>
                        <td align="left">Název:</td>
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
                        <td align="left">Popis knihy:</td>
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
                        <td align="left">Kategorie:</td>
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
                        <td align="left">Žánr:</td>
                    </tr>
                    <tr>
                        <td>
                            <select id="genre" name="genre">
                                <option value="horror">Horor</option>
                                <option value="roman">Román</option>
                                <option value="comedy">Komedie</option>
                                <option value="drama">Drama</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td align="left">Fotografie:</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="file" id="imageFile" name="image" size="600">
                            <label for="imageFile"> VYBERTE FOTO</label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center"><input type="SUBMIT" name="upload" value="POSLAT" required/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

        <?php else: ?>

    <div class="alertToLogIn">
        <h1>Musíte se první přihlásit</h1>
    </div>
        <?php endif; ?>







    <section id="questions">
        <h1>máte <br>
            otázky ?</h1>
        <button><a href="contact.php">zkus mě</a> </button>
    </section>
</div>
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