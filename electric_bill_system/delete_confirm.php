<?php
session_start();
var_dump($_SESSION["bill_list"]);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['index'])) {
    $index = $_POST['index'];
    
    if (isset($_SESSION["bill_list"][$index])) {

        unset($_SESSION["bill_list"][$index]);

        $_SESSION["bill_list"] = array_values($_SESSION["bill_list"]);

        header("Location: payment_list.php");
        exit;
    } else {
        echo "Index not found!";
    }
} else {
    echo "Invalid request!";
}
