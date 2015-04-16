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
echo "<Brands>\n";
$db = Database::getInstance();
$mysqli = $db->getConnection();
$catId = $_POST['catId'];
$subcatId = $_POST['subcatId'];
$getBrands = $mysqli->query("SELECT * FROM brands WHERE catId='$catId' AND subcatId='$subcatId'");
try {
    while($row = mysqli_fetch_array($getBrands, MYSQLI_ASSOC)) {
        echo "<Brand>\n\t<id>".$row['brandId']."</id>\n\t<name>".$row['Brand']."</name>\n</Brand>\n";
    }
}
catch(PDOException $e) {
    echo $e->getMessage();
    die();
}
echo "</Brands>";
?>
