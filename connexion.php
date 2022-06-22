<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "gestion_stock_medicament";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    $check_connection = FALSE;
    $check_connection_message = "";
    if (! $conn ) {
        die('Could not connect to: ' .mysqli_error($conn));
    }
?>