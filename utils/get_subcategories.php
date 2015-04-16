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
echo "<SubCategories>\n";
$db = Database::getInstance();
$mysqli = $db->getConnection();
$catID = $_POST['catId'];

$getSubCategories = $mysqli->query("SELECT * FROM subcategories WHERE catId='.$catID.'");
try {
    while($row = mysqli_fetch_array($getSubCategories, MYSQLI_ASSOC)) {
        echo "<SubCategory>\n\t<id>".$row['subcatId']."</id>\n\t<name>".$row['Subcategory']."</name>\n</SubCategory>\n";
    }
}
catch(PDOException $e) {
    echo $e->getMessage();
    die();
}
echo "</SubCategories>";
?>
