<?php
    session_start();
?>
<?php
if($_SESSION['username'] != null || $_SESSION['username'] !=''){
    session_destroy();
    header("Location:index.php");
}
?>