<?php
class watchedWatchlistLists{
    public function __construct(){
        $this->mysqlMovie=mysqli_connect('localhost','admin','penis','vascakmatyas_movies');
        $this->mysqlUser=mysqli_connect('localhost','admin','penis','vascakmatyas_users');
    }

    function addToWatched(){
        if(0==0) {
            $msg = "";
            $dbUser = $this->mysqlUser;
            $userId = $_SESSION['user_id'];
                                                                                                                    //ziska vsechny data kde id je userid
            $resultSet = $dbUser->query("SELECT * FROM watched WHERE userID = '$userId'LIMIT 1");
            if ($resultSet->num_rows == 0) {                                                                     //pokud tam id uzivatele jeste neni tak ho tam prida
                $sql = "INSERT INTO watched(userID)VALUES('$userId')";
                mysqli_query($dbUser, $sql);
            }
                                                                                                                //generuje nazev pro novy column
        
            $sql = "SELECT * FROM watched WHERE userID = '$userId' ";
            $result = mysqli_query($dbUser, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $pureNumberOfMovies = $row['movNum'];
                $_SESSION['pureNumberOfMovies'] = $pureNumberOfMovies;
                $numberOfMovies = "movie" . $row['movNum'];
            }
        
            $sql = "SELECT * FROM watched WHERE userID = '$userId' ";
            $result = mysqli_query($dbUser, $sql);
                                                                                                                    //stara se o kontrolu jesttli tam uz film je
            while ($row3 = mysqli_fetch_array($result)) {
        
                for ($i = $pureNumberOfMovies; $i >= 1; $i--) {
                    $currentMovieId = 0;
                    $currentMovieId = $row3['movie' . $i . ''];
                    $movieId = $_GET['id'];
        
                    $mysqli = $this->mysqlUser;

                     $alreadyInUse = false;                                                                                         // kontroluje jestli film uz byl pridan
                    if($currentMovieId == $movieId ){
                        $alreadyInUse = true;
                    }
                }
        
                if ($alreadyInUse == false) {
                    $alreadyInUse = false;
        
                                                                                                            //pocita pocet filmu
                    $sql = "UPDATE watched SET movNum = movNum +1 WHERE userID = '$userId'";
                    mysqli_query($dbUser, $sql);
        
                                                                                                            // vutvori novy column
                    $sql = "ALTER TABLE watched ADD COLUMN $numberOfMovies int(11);";
                    mysqli_query($dbUser, $sql);
        
                                                                                                            //ziska pocet filmu kde je id userid
                    $movieId = $_GET['id'];
                    $sql = "UPDATE watched SET $numberOfMovies = $movieId WHERE userID = '$userId'";
                    mysqli_query($dbUser, $sql);
        
                }
        
                $sql = "SELECT * FROM watchlist WHERE userID = '$userId' ";
                $result = mysqli_query($dbUser, $sql);
        
                while ($row4 = mysqli_fetch_array($result)) {                                       //kontroluje jestli tentp pridany film do watched je ve watchlistu
                    $pureNumberOfMoviesWatchlist = $row4['movNum'];
        
                    for ($i = $pureNumberOfMoviesWatchlist; $i >= 1; $i--) {
                        $currentMovieId = $row4['movie' . $i . ''];
                        $currentMovieIdName = 'movie' . $i ;
                        $movieId = $_GET['id'];
        
                        if ($currentMovieId == $movieId) {
                            $sql = "UPDATE watchlist SET $currentMovieIdName = null WHERE userID = '$userId' AND $currentMovieId = '$movieId'";     //pokud ano tak ho smaze z watchlistu
                            mysqli_query($dbUser, $sql);
                        }
                    }
                }
            }
        }
    }

        function generateWatched(){
            $userId = $_SESSION['user_id'];
            $pureNumberOfMovies = $_SESSION['pureNumberOfMovies'];

                $sql = "SELECT * FROM watched WHERE userID = '$userId'";
                $result = mysqli_query($this->mysqlUser, $sql);
                

                while ($row1 = mysqli_fetch_array($result)){
                                                                                //projede databazi podle nazvu vygenerovanych diky poctu zapisu
                    for($i = $pureNumberOfMovies; $i >= 1; $i--) {
                        $currentMovieId = 0;
                        $currentMovieId = $row1['movie' . $i . ''];


                        $db = $this->mysqlMovie;
                        $sql = "SELECT * FROM movies WHERE id = $currentMovieId";
                        $result = mysqli_query($db, $sql);

                                                                                //generuje html s nahledem filmu
                        while ($row2 = mysqli_fetch_array($result)) {
                            echo "<div class='imgDiv'>";
                            echo "<img src='img/" . $row2['image'] . "'>";
                            echo "<h2>" . $row2['name'] . "</h2>";
                            echo "<p>" . $row2['text'] . "</p>";

                            echo "<button  class='button_moreInfo'><a href=info.php?id=" . $row2['id'] . "><i class='fa fa-info'></i></a></button>";

                            echo"<button  class='button_moreInfo'><a href=watchlist.php?id=".$row2['id']."> <i class='fa fa-bookmark'></i></a></button>";
                            echo "</div>";
                        }
                    }

                }
        }


        function addToWatchlist(){
            if(0==0) {
                $msg = "";
                $dbUser = $this->mysqlUser;
                $userId = $_SESSION['user_id'];
                                                                                                                    //ziska vsechny data kde id je userid
                $resultSet = $dbUser->query("SELECT * FROM watchlist WHERE userID = '$userId'LIMIT 1");
                if ($resultSet->num_rows == 0) {                                                                     //pokud tam id uzivatele jeste neni tak ho tam prida
                    $sql = "INSERT INTO watchlist(userID)VALUES('$userId')";
                    mysqli_query($dbUser, $sql);
                }
                                                                                                                            //generuje nazev pro novy column
            
                $sql = "SELECT * FROM watchlist WHERE userID = '$userId' ";
                $result = mysqli_query($dbUser, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $pureNumberOfMovies = $row['movNum'];
                    $numberOfMovies = "movie" . $row['movNum'];
                    $_SESSION['pureNumberOfMovies2'] = $pureNumberOfMovies;
                    //echo $numberOfMovies;
                }
            
            
            
            $sql = "SELECT * FROM watched WHERE userID = '$userId' ";
            $result = mysqli_query($dbUser, $sql);
            
            while ($row4 = mysqli_fetch_array($result)) {
            
                for ($i = $pureNumberOfMovies; $i >= 1; $i--) {
                    $currentMovieId = $row4['movie' . $i . ''];                                                                         //zjistuje jestli uz mate film ve watched, porvnava kazdy column jestli ma v sobe id filmu co chete pridat
                    $movieId = $_GET['id'];
            
                    $mysqli = $this->mysqlUser;
            
                    if ($currentMovieId == $movieId) {
                        $alreadyInUseWatched = true;
                    }
                }
            }
            
            
                $sql = "SELECT * FROM watchlist WHERE userID = '$userId' ";
                $result = mysqli_query($dbUser, $sql);
            
                while ($row3 = mysqli_fetch_array($result)) {
            
                    for ($i = $pureNumberOfMovies; $i >= 1; $i--) {
                        $currentMovieId = $row3['movie' . $i . ''];
                        $movieId = $_GET['id'];
            
                        $mysqli = $this->mysqlUser;
                                                                                                                                            //zjistuje jestli uz mate film v watchlistu porvnany kazdy column jest;i ma v sobe id filmu co chete pridat
                        //$resultSet = $mysqli->query("SELECT * FROM watchlist WHERE  $currentMovieId = $movieId LIMIT 1");
                        $alreadyInUse = false;
                        if($currentMovieId == $movieId ){
                            $alreadyInUse = true;
                        }
            
                    }
            
                        if ($alreadyInUse == false && $alreadyInUseWatched == false) {
                            //echo "prosel if";
                            $alreadyInUse = false;
                            $alreadyInUseWatched =false;
            
                                                                                                                        //pocita pocet filmu
                            $sql = "UPDATE watchlist SET movNum = movNum +1 WHERE userID = '$userId'";
                            mysqli_query($dbUser, $sql);
            
                                                                                                                        // vutvori novy column
                            $sql = "ALTER TABLE watchlist ADD COLUMN $numberOfMovies int(11);";
                            mysqli_query($dbUser, $sql);
            
                                                                                                                        //ziska pocet filmu kde je id userid
                            $movieId = $_GET['id'];
                            $sql = "UPDATE watchlist SET $numberOfMovies = $movieId WHERE userID = '$userId'";
                            mysqli_query($dbUser, $sql);
            
                    }
                }
            }
        }



        function generateWatchlist(){
            $userId = $_SESSION['user_id'];
            $pureNumberOfMovies = $_SESSION['pureNumberOfMovies2'];
            $sql = "SELECT * FROM watchlist WHERE userID = '$userId'";
            $result = mysqli_query($this->mysqlUser, $sql);

            while ($row1 = mysqli_fetch_array($result)){
                                                                                                                //projede databazi podle nazvu vygenerovanych diky poctu zapisu
                for($i = $pureNumberOfMovies; $i >= 1; $i--) {
                    $currentMovieId = $row1['movie' . $i . ''];


                    $db = $this->mysqlMovie;
            $sql = "SELECT * FROM movies WHERE id = $currentMovieId";
            $result = mysqli_query($db, $sql);
print_r($result);
                                                                                                                 //generuje html s nahledem filmu
            while ($row2 = mysqli_fetch_array($result)) {
                echo "<div class='imgDiv'>";
                echo "<img src='img/" . $row2['image'] . "'>";
                echo "<h2>" . $row2['name'] . "</h2>";
                echo "<p>" . $row2['text'] . "</p>";

                echo "<button  class='button_moreInfo'><a href=info.php?id=".$row2['id']."><i class='fa fa-info'></i></a></button>";

                echo "<button  class='button_moreInfo'><a href=watched.php?id=".$row2['id']."><i class='fa fa-check'></i></a></button>";
                echo "</div>";
            }
                }

            }
        }




}