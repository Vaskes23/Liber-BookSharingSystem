<?php
$dbMovies =  mysqli_connect('localhost','admin','penis','vascakmatyas_movies');
if(isset($_POST['upload'])){

                                                                            //nahrava veci o filmu do databaze
    $msg ="";
    $target = "img/".basename($_FILES['image']['name']);                        //urci lokaci slozky s obrazky


                                                                            //urceni hodnot s tagy v html
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];
    $description = $_POST['description'];
    $director = $_POST['director'];
    $link = $_POST['link'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $genre = $_POST['genre'];

                                                                            //nahrani do databaze

    $sql = "INSERT INTO movies(image,text,director,description,link,name,category,genre) VALUES ('$image','$text','$director','$description','$link','$name','$category','$genre')";
    mysqli_query($dbMovies, $sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Image uploaded";
    }else{
        $msg = "There was a problem";
    }
}

if(isset($_POST['uploadDirector'])){
                                                                    //nahrava veci o reziserovy do databaze
    $msg2 ="";
    $target2 = "img/".basename($_FILES['imageDirector']['name']);


                                                                                //urceni hodnot s tagy v html
    $image2 = $_FILES['imageDirector']['name'];
    $text2 = $_POST['textDirector'];
    $description2 = $_POST['descriptionDirector'];
    $director2 = $_POST['director'];


                                                                            //nahrani do databaze o reziserech
    $sql = "INSERT INTO directors(image,text,name,description) VALUES ('$image2','$text2','$director2','$description2')";
    mysqli_query($dbMovies, $sql);

    if(move_uploaded_file($_FILES['imageDirector']['tmp_name'], $target2)){
        $msg2 = "Image uploaded";
    }else{
        $msg2 = "There was a problem";
    }
}