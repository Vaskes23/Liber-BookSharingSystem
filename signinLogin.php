<?php
class signinLoginLogic{
    public function __construct(){
        $this->mysqlMovie=mysqli_connect('localhost','admin','penis','vascakmatyas_movies');
        $this->mysqlUser=mysqli_connect('localhost','admin','penis','vascakmatyas_users');
    }

    function signinForm(){
        session_start();
        $_SESSION;

        $error = NULL;

        if(isset($_POST['submit'])){
                                                                                                                                //vezme si data z formu
            $u = $_POST['u'];
            $p = $_POST['p'];
            $p2 = $_POST['p2'];
            $e = $_POST['e'];
        
            if(strlen($u)<5){
                $error= "<p>Username needs to be more than 5 chracters</p>";
                                                                                                                    //jmeno musi byt delsi nez 5 znaku
            }elseif ($p2 != $p){
                $error .= "<p> passwords does not match </p>";
                                                                                                                    //hesla se musi shodovat
            }else{
                $mysqli = $this->mysqlUser;
        
                $u = $mysqli->real_escape_string($u);
                $p = $mysqli->real_escape_string($p);
                $p2 = $mysqli->real_escape_string($p2);
                $e = $mysqli->real_escape_string($e);
        
                $vkey = md5(time().$u);
        
                $p = md5($p);
                                                                                                                //zapise data do DB a zahashuje heslo pro bezpecnost
                $insert = $mysqli->query("INSERT INTO users(username,password,email,vkey)VALUES('$u','$p','$e','$vkey')");
        
                if($insert){
                    require 'phpmailer/PHPMailerAutoload.php';
                                                                                                                 //vyzada si PHPmailer pro poslani emailu nebo gmailu
                    $mail = new PHPMailer;
        
                //$mail->SMTPDebug = 3;
                                                                                                            //urceni udaji pro mailer
        
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'matyasvaskes@gmail.com';
                    $mail->Password = 'VaskeS1-.';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
        
                    $mail->setFrom('matyasvaskes@gmail.com', 'Mailer');
                    $mail->addAddress('matyasvaskes@gmail.com', 'imdbMailer');
                    $mail->addAddress($e);
        
                    $mail->addCC('matyasvaskes@gmail.com');
                    $mail->addBCC('matyasvaskes@gmail.com');
        
        
        
                    $mail->Subject = 'Here is the subject';
                                                                                                                                                            //odkaz diky kteremu si budete moci overit vas ucet ve vami zadanem emailu
                    $mail->Body    = "<a href='http://localhost:8090/MProjetkCode/verify.php?vkey=$vkey'>Odkaz pro registraci v Liber</a>";
                    $mail->AltBody = 'http://localhost:8090/MProjetkCode/verify.php?vkey=$vkey';
        
                    if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        //echo 'Message has been sent';
                        $_SESSION['message_sent'] = true;
                    }
                }else{
                    echo $mysqli->error;
                }
        
            }
        }
        
    }

    function loginForm(){
        $_SESSION['user_logged_in'] = false;
        $_SESSION['user_admin'] = false;
        $_SESSION['user_basic'] = false;
        $_SESSION['user_critic'] = false;
        $_SESSION['user_id'] = 0;
        
        //error_reporting( E_ALL );
        //ini_set( "display_errors", 1 );
        
        $error = NULL;
        
        if (isset($_POST['submit'])){
            $mysqli = $this->mysqlUser;
        
            $u = $mysqli->real_escape_string($_POST['u']);
            $p = $mysqli->real_escape_string($_POST['p']);
            $p = md5($p);
                                                                                                                                                //porovna zadane udaje s udajy z DB a urci jestli mame tento ucet
            $resultSet = $mysqli->query("SELECT * FROM users WHERE username = '$u' AND password = '$p' LIMIT 1");
        
            if($resultSet->num_rows != 0){
                $row = $resultSet->fetch_assoc();
                $verified = $row['verified'];
                $email = $row['email'];
                if($verified==1){
                    $_SESSION['user_logged_in'] = true;
                                                                                                                                                    //kontroluje roli uzivatele a podle toho urci jeho pravomoce
                    $adminAccount = $mysqli->query("SELECT * FROM users WHERE username = '$u' AND password = '$p' AND role = 2 LIMIT 1");
                    $criticAccount = $mysqli->query("SELECT * FROM users WHERE username = '$u' AND password = '$p' AND role = 1 LIMIT 1");
                    $userAccount = $mysqli->query("SELECT * FROM users WHERE username = '$u' AND password = '$p' AND role = 0 LIMIT 1");
                    if($adminAccount->num_rows == 1){
                        $_SESSION['user_admin'] = true;
                    }else if($userAccount->num_rows == 1){
                        $_SESSION['user_basic'] = true;
                    }else if($criticAccount->num_rows == 1){
                        $_SESSION['user_critic'] = true;
                    }
        
                                                                                                                                            //ziska id prihlaseneho uzivatele
                    $db =  mysqli_connect('localhost','admin','penis','vascakmatyas_users');
                    $sql = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_array($result)){
                        $_SESSION['user_id'] = $row['id'];
                    }
                }else{
                    $error = "account is not verified, check email: $email";
                }
        
            }else{
                $error = "incorect infromation";
            }
        }
    }
}