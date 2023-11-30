<?php

//------------------------
// INPUT:
//   accountx = <9_digit_number>
//   datastring1 = <long_string>
//   datastring2 = <long_string>
//   ...
//   datastring20 = <long_string>
//------------------------
// OUTPUT:
//   systemResult = 2
//   msg = <message>
// OR
//   systemResult = 3
//   msg = <message>
//------------------------

//--------------------------------------------------------------
//header
//--------------------------------------------------------------

header('Content-type: application/x-www-form-urlencoded; charset=utf-8');

//--------------------------------------------------------------
//checking prerequirements
//--------------------------------------------------------------

if (!isset($_POST["accountx"]) || !is_numeric($_POST["accountx"]) || $_POST["accountx"] < 100_000_000 || $_POST["accountx"] > 999_999_999)
{
    $obj = (object)[];
    $obj->systemResult = 3;
    $obj->msg = "accountx error";
    die(http_build_query($obj));
}

//--------------------------------------------------------------
//connection
//--------------------------------------------------------------

require "lib/connect.php";

//--------------------------------------------------------------
//work
//--------------------------------------------------------------

// prepare and bind
$stmt = $conn->prepare("INSERT INTO `transfer`(`accountx`, `data`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `data` = ?");
$stmt->bind_param("iss", $accountx, $data, $data);

// set parameters and execute
$accountx = $_POST["accountx"];
$data = json_encode($_POST);

$stmt->execute();

$obj = (object)[];
$obj->systemResult = 2;
$obj->msg = "Uploaded successfully";

echo http_build_query($obj);

$stmt->close();
$conn->close();

//--------------------------------------------------------------