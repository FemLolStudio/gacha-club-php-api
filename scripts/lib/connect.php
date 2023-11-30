<?php

$servername = getenv("SERVER");
$servername = getenv("PORT");
$username = getenv("USER");
$password = getenv("PASSWORD");
$dbname = getenv("DATABASE");

// Create connection
try
{
    $conn = new mysqli($servername, $username, $password, $dbname);
}
catch (mysqli_sql_exception $th)
{
    $obj = (object)[];
    $obj->systemResult = 3;
    $obj->error = "Connection failed: " . $th;
    die(http_build_query($obj));
}
$conn->set_charset("utf8mb4");

// Check connection
if ($conn->connect_error)
{
    $obj = (object)[];
    $obj->systemResult = 3;
    $obj->error = "Connection failed: " . $conn->connect_error;
    die(http_build_query($obj));
}