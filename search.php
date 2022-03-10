<?php
session_start();

//error_reporting( E_ALL );
//ini_set( "display_errors", 1 );
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Matyáš Vaščák" />
    <meta name="robots" content="all" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/favicon.png" rel="shortcut icon" type="image/png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/search.css"/>
</head>

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
<body>

<div class="content">

    <?php
    function search(){
    $dbMovies =  mysqli_connect('localhost','admin','penis','vascakmatyas_movies');
    $searchBar = $_SESSION['searchBar'];                                                                            //vezme si data ze searhcbaru
    $searchedText = "'[[:<:]]".$searchBar."[[:>:]]'";                                                               //vlozi je do sql query ktera umoznuje vuhledavat jednotliva slova a chrani pred injection
    //echo $searchedText;


    for ($i = 0; $i <= 3; $i++) {
                                                                                                                //porovnava jestli ta informace je v jedno z techto column a tabulek b DB
        if($i==0){
            $sql = "SELECT * FROM directors WHERE name REGEXP $searchedText";
            $directorSearch = true;                                         //urci jestli nasel rezisera
        }else if ($i == 1){
            $sql = "SELECT * FROM movies WHERE text REGEXP $searchedText";
            $directorSearch = false;
        }else if ($i == 2){
            $sql = "SELECT * FROM movies WHERE name REGEXP $searchedText";
            $directorSearch = false;
        }else{
            $sql = "SELECT * FROM movies WHERE name REGEXP swag";

            echo "<h1 style= 'margin: 80px; text-align: center' >THOSE ARE ALL YOUR RESULTS</h1>";
        }

    $result = mysqli_query($dbMovies, $sql);
    while ($rowSearch = mysqli_fetch_array($result)) {
                                                                                                            //vygeneruje informace vybrane z DB a podle toho jestli to byl reziser nebo film upravi html
        echo "<div class='allSearchResults'>";
        echo"<div class='watchAgain'>";
        echo"<div class='watchAgainMovies'>";

        echo "<img src='img/" . $rowSearch['image'] . "'>";
        echo"<div class='watchNameText'>";
        echo "<h2>" . $rowSearch['name'] . "</h2>";
        echo "<p>" . $rowSearch['text'] . "</p>";

        echo"</div>";
        echo"</div>";
        if($directorSearch == false){                                                                       //pokud nasel rezisera udla zmeny v interakci s search vysledkem
        echo"<button  class='button_moreInfo'><a href=info.php?id=".$rowSearch['id']."><i class='fa fa-info'></i></a></button>";
        echo"<button  class='button_moreInfo'><a href=watched.php?id=".$rowSearch['id']."><i class='fa fa-check'></i></a></button>";
        echo"<button  class='button_moreInfo'><a href=watchlist.php?id=".$rowSearch['id']."> <i class='fa fa-bookmark'></i></a></button>";
        }else{
            echo"<button  class='button_moreInfo'><a href=infoDirector.php?id=".$rowSearch['id']."><i class='fa fa-info'></i></a></button>";

        }
        echo"</div>";

        echo"</div>";
        }
    }
}
    search();

    ?>
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
