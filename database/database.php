<?php
    $database = "localhost";
    $data_user = "root";
    $data_pass = "";
    $data_name = "businessdb";
    $connection = "";

    try {
        $connection = mysqli_connect($database,
                                $data_user,
                                $data_pass,
                                $data_name);
    } catch (mysqli_sql_exception) {
        echo "No connect!";
    }
?>