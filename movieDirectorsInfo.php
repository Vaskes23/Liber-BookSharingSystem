<?php
class movieDirectorsInfo{
    public function __construct(){
        $this->mysqlMovie=mysqli_connect('localhost','admin','penis','vascakmatyas_movies');
        $this->mysqlUser=mysqli_connect('localhost','admin','penis','vascakmatyas_users');
    }

    function infoDirector(){
        //$dbMovies =  mysqli_connect('82.208.16.182','vascakmatyas','penis','vascakmatyas_movies');
        $infoURL = $_GET['id'];
    
        $sql = "SELECT * FROM directors WHERE id = $infoURL";
        $result = mysqli_query($this->mysqlMovie, $sql);
        while ($rowDirector = mysqli_fetch_array($result)){
                                                                                                                    //vypise informace i reziserovi ktereho jste si vybrali z DB
            echo"</div>";
            echo"<div class='mainBox'>";
            echo"<div class='imgDivDirector'>";
            echo"<img src='img/".$rowDirector['image']."'>";
            echo"</div>";
            echo"<div class='informationName'>";
            echo"<h1>".$rowDirector['name']."</h1>";
            echo "<p>".$rowDirector['text']."</p>";
            echo "<p>".$rowDirector['description']."</p>";
            echo"</div>";
            echo"</div>";
            $directorName = $rowDirector['name'];
        }
    
    
        echo"<div class='content'>";
        echo"<h1>HIS MOVIES ></h1>";
        echo"<div class='movies'>";
            echo"<section id='carouselMovies'>";
    
                $sql = "SELECT * FROM movies WHERE director = '$directorName' ";
    
                $result = mysqli_query($this->mysqlMovie, $sql);
    
                while ($row = mysqli_fetch_array($result)){
                                                                                                                                                            //vypise filmy ktere tento reziser natocil podle toho jestli najde shodu z jeho jmenem v DB movies
                    echo"<div class='imgDivDirectorMovies'>";
                    echo"<img src='img/".$row['image']."'>";
                    echo"<h2>".$row['name']."</h2>";
                    echo "<p>".$row['text']."</p>";
    
                    echo"<button  class='button_moreInfo'><a href=info.php?id=".$row['id']."><i class='fa fa-info'></i></a></button>";
    
                    echo"<button  class='button_moreInfo'><a href='watched.php?id=".$row['id']."'><i class='fa fa-check'></i></a></button>";
                    echo"<button  class='button_moreInfo'><a href='watchlist.php?id=".$row['id']."'><i class='fa fa-bookmark'></i></a></button>";
                    echo"</div>";
                }
            }

            function infoMovies(){
                $infoURL = $_GET['id'];
            
                $sql = "SELECT * FROM movies WHERE id = $infoURL";
                $result = mysqli_query($this->mysqlMovie, $sql);
                while ($row = mysqli_fetch_array($result)){
            
                    echo"<div class='video'>";                                                      //kod ktery si vezme normalni URL z databaze a predalaho do embed verze videa z youtube
                    $url = $row['link'];
                    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                    $ytURL = "https://www.youtube.com/embed/";
                    $ytURL .= $my_array_of_vars['v'];
            
            
            
            
            
                    echo' <iframe width="940" height="504" src='.$ytURL.' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    echo"</div>";
                    echo"<div class='mainBox'>";
                    echo"<div class='imgDiv'>";
                    echo"<img src='img/".$row['image']."'>";
                    echo"</div>";
                    echo"<div class='informationName'>";
                    echo"<h1>".$row['name']."</h1>";
                    echo"<div class='ratingDiv'>";
                    echo"<h2>CRITICS</h2>";
                    echo "<h3>".$row['criticScore']."%"."</h3>";
                    echo"<h2>PEOPLE</h2>";
                    echo "<h3>".$row['audienceScore']."%"."</h3>";
                    echo"</div>";
                    echo"<button  class='button_moreInfo'><a href='watched.php?id=".$row['id']."'><i class='fa fa-check'></i></a></button>";
                    echo"<button  class='button_moreInfo'><a href='watchlist.php?id=".$row['id']."'><i class='fa fa-bookmark'></i></a></button>";
                    echo"</div>";
                    echo"</div>";
                    echo"<div class='informationText'>";
                    echo"<h1>MORE INFO ></h1>";
                    echo"<div class='boxText'>";
                    echo "<p>".$row['text']."</p>";
                    echo "<div class='mainInfo'>";
                    echo "<p>".$row['description']."</p>";
            
                    $directorsName = $row['director'];
                    $movieWithDirector = false;
                    //echo $directorsName;
            
                $sqlDirector = "SELECT * FROM directors WHERE name = '$directorsName'";                                         // kontroluje jestli reziser tohoto filmu ma o sobe stranku
                $resultDirector = mysqli_query($this->mysqlMovie, $sqlDirector);
                while ($rowDirectors = mysqli_fetch_array($resultDirector)) {
                    echo "<p>Directed by: <a href='infoDirector.php?id=" . $rowDirectors['id'] . "'>" . $row['director'] . "</a></p>";      //pokud ano ukaze jeho jmno jako link co vas hodi na jeho stranku
                    $movieWithDirector = true;
                }
                if($movieWithDirector == false){
                    echo "<p>Directed by: " . $row['director'] . "</p>";                                                            //pokud ne ukaze jeho jmeno jako normalni text
            
                }
                    echo"</div>";
                    echo"</div>";
                    echo"</div>";
                    echo"</div>";
                }
            }

            function movieRating(){
                $infoURL = $_GET['id'];
                $rating = $_POST['rating'];
                if(isset($_POST['upload'])){
                    $msg ="";
                    $rating = $_POST['rating'];
        
                    if($_SESSION['user_basic'] == true){
                        $sql = "UPDATE movies SET audienceScoreN = audienceScoreN +1 WHERE id = '$infoURL'";
                        mysqli_query($this->mysqlMovie, $sql);
                                                                                                                                            //pocita celkove hodnoceni od uzivatelu podle inputu ktery date
        
                        $sql = "SELECT * FROM movies WHERE id = '$infoURL'";
                        $result = mysqli_query($this->mysqlMovie, $sql);
                        while ($row = mysqli_fetch_array($result)){
        
                            $finalRating =  ($row['audienceScore']*($row['audienceScoreN'] - 1) + $rating) / $row['audienceScoreN'];//algoritmus na spocitani prumerneho hodnoceni id lidi
                           // echo $row['audienceScore']."    ";
                            //echo $row['audienceScoreN']."    ";
        
                           // echo $finalRating;
                        }
                            $sql = "UPDATE movies SET audienceScore = '$finalRating' WHERE id = '$infoURL'";
                            mysqli_query($this->mysqlMovie, $sql);
        
        
        
        
                    }else if($_SESSION['user_critic'] == true){
                        $sql = "UPDATE movies SET criticScoreN = criticScoreN +1 WHERE id = '$infoURL'";
                        mysqli_query($this->mysqlMovie, $sql);
                                                                                                                                                    //pocita celkove hodnoceni od kritiku
        
                        $sql = "SELECT * FROM movies WHERE id = '$infoURL'";
                        $result = mysqli_query($this->mysqlMovie, $sql);
                        while ($row = mysqli_fetch_array($result)){
        
                            $finalRating =  ($row['criticScore']*($row['criticScoreN'] - 1) + $rating) / $row['criticScoreN'];      //algoritmus na spocitani prumerneho hodnoceni od kritiku
                            //echo $row['criticScore']."    ";
                           // echo $row['criticScoreN']."    ";
                            //echo $finalRating;
                        }
        
                        $sql = "UPDATE movies SET criticScore = '$finalRating' WHERE id = '$infoURL'";
                        mysqli_query($this->mysqlMovie, $sql);
                    }
        
                }
            }
     
}