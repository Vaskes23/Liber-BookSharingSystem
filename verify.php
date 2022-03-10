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
                            <li><button  class="button_signIn"><a href="signIn.php">PŘIHLÁSIT</a></button></li>


                    </div>
                </div>


            </ul>
        </nav>
    </div>
</header>

<?php
function verification(){
if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];                                                                                                                  //ziska vas verification key z URL

    $mysqli = NEW MySQLi('localhost','admin','penis','vascakmatyas_users');
                                                                                                                             //vybere jakeho uzivatele je tento klic
    $resultSet = $mysqli->query("SELECT verified,vkey FROM users WHERE verified = 0 AND vkey ='$vkey' LIMIT 1");
    if($resultSet->num_rows == 1){
                                                                                                                            //zmneni mu ucet na verifikovany
        $update = $mysqli->query("UPDATE users SET verified = 1 WHERE vkey ='$vkey' LIMIT 1 ");
        if($update){
                                                                                                                             //rekne va jestli jste verifikovani nebo ne
            echo"<div class='login'>";
            echo "<h1>Váš účet je aktivní</h1>";
            echo "<h1>Můžete se přihlásit</h1>";
            echo"</div>";
        }else{
            echo "<div class='content'>";
            echo"<div class='login'>";
            echo"<h1>error</h1>";
            echo"</div>";
            echo"</div>";
            echo $mysqli->error;
        }
    }else{
        "already verified";
    }
}else{
    die("something went wrong");
}
}
verification();