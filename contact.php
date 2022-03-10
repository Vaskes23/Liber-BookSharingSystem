<?php
include 'sendmail.php';
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
    <link rel="stylesheet" href="css/contact.css" />
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
                        <li><a href="">Pomoc</a></li>
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

<?php
//$obsah = include('podstranky/'. $_GET['uvod'].'.php');
//echo $obsah;
?>

<div class="content">
    <h1>Napište nám</h1>
    <div class="signIn">
        <form method="POST" action="">
            <table>
                <tr>
                    <td align="left">Jméno:</td>
                </tr>
                <tr>
                    <td><input type="TEXT" name="name" required/></td>
                </tr>
                <tr>
                    <td align="left">Email:</td>
                </tr>
                <tr>
                    <td><input type="EMAIL" name="email" required/></td>
                </tr>
                <tr>
                    <td align="left">Zpráva:</td>
                </tr>
                <tr>
                    <td><textarea type="TEXT" name="message" rows="10"  required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Poslat" required/></td>
                </tr>
            </table>
        </form>
        <?php
        $error = NULL;
        ?>
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
                    <li><a href="">Pomoc</a></li>
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