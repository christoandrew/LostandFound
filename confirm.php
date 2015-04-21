<?php
include_once "utils/db_connect.php";

$db = Database::getInstance();
$mysqli = $db->getConnection();

if(!empty($_GET['email']) && !empty($_GET['token'])){
    $email = $_GET['email'];
    $token = $_GET['token'];

    $verifyData = $mysqli->query("SELECT * FROM Users WHERE email='$email' AND activationtoken='$token'");

    if($verifyData){
        if(mysqli_num_rows($verifyData) > 0){
            $activateUser = $mysqli->query("UPDATE Users SET Activation='1' WHERE email='$email'");
            if($activateUser){
                echo "Activation Complete";
                header("Location:index.php");
            }
        }else{
            echo "Please Check That You Are Using A Valid Link";
        }
    } else {
        printf("Error occurred %s", $mysqli->error);
    }
} else{
    echo "Required Data Missing";
}