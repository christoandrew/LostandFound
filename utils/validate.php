<?php
include_once "db_connect.php";

$db = Database::getInstance();
$mysqli = $db->getConnection();
$value = $_GET['query'];
$formfield = $_GET['field'];

// Check Valid or Invalid user name when user enters user name in username input field.
if ($formfield == "username") {
    $checkUsername = $mysqli->query("SELECT * FROM users WHERE username='$value'");
    if (strlen($value) < 4) {
        echo "<p class='message alert-danger'>Username is Too Short</p>";
    }
    else if (mysqli_num_rows($checkUsername) > 0){
        echo "<p class='message alert-danger'>Username is Taken</p>";
    }else{
        echo "<p class='message alert-success'>Username is Available</p>";
    }


}
// Check Valid or Invalid password when user enters password in password input field.
if ($formfield == "password") {
    if (strlen($value) < 6) {
        echo "<p class='alert-danger'>Password too short</p>";
    } else {
        echo "<p class='message alert-success'>Strong</p>";
    }
}
// Check Valid or Invalid email when user enters email in email input field.
if ($formfield == "email") {
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
        echo "Invalid email";
    } else {
        $checkEmail = $mysqli->query("SELECT * FROM users WHERE email='$value'");
        if(mysqli_num_rows($checkEmail) > 0){
            echo "<p class='alert-danger'>Email Already In Use</p>";
        }
    }
}
// Check Valid or Invalid website address when user enters website address in website input field.
if ($formfield == "website") {
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $value)) {
        echo "Invalid website";
    } else {
        echo "<span>Valid</span>";
    }
}
?>