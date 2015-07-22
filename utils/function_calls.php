<?php
require_once "admin_functions.php";


if (isset($_GET['action'])) {
    $option = $_GET['action'];

    if(in_array($option, get_defined_functions()['user']) === true) {
        call_user_func($option);
    } else {
        complaint();
    }
} else {
    echo '<div class="jumbotron">
  <h1>Welcome To The Administration Panel </h1>
  <p>You can manage user accounts and property.</p>
  </div>';
}