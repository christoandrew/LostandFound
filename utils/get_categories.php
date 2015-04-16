<?php
/**
 * Created by PhpStorm.
 * User: abel
 * Date: 4/10/2015
 * Time: 9:28 AM
 */

include_once "db_connect.php";

header("Content-type: text/xml");
echo "<?xml version=\"1.0\" ?>\n";
echo "<Categories>\n";
$db = Database::getInstance();
$mysqli = $db->getConnection();
$getAllCategories = $mysqli->query("SELECT * FROM Categories");
try {
    while($row = mysqli_fetch_array($getAllCategories, MYSQLI_ASSOC)) {
        echo "<Category>\n\t<id>".$row['catId']."</id>\n\t<name>".$row['Category']."</name>\n</Category>\n";
    }
}
catch(PDOException $e) {
    echo $e->getMessage();
    die();
}
echo "</Categories>";
?>
