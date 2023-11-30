<?php

// static variables
// if you don't cant use somewhy enviorments write here the connection datas
$static_SERVER = "localhost"; // SERVER, this can be an IP address too, like "127.0.0.1"
$static_PORT = "3306"; // PORT, 1-65535
$static_USER = "root"; // USER, mysql username
$static_PASSWORD = ""; // PASSWORD, mysql password, example: "password@123"
$static_DATABASE = "gacha-club"; // DATABASE, mysql database

// enviorment variables
$servername = getenv("SERVER") ?: $static_SERVER;
$port = getenv("PORT") ?: $static_PORT;
$username = getenv("USER") ?: $static_USER;
$password = getenv("PASSWORD") ?: $static_PASSWORD;
$dbname = getenv("DATABASE") ?: $static_DATABASE;

// Create connection
try
{
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
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