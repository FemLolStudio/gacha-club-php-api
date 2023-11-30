<?php

//------------------------
// INPUT:
//   accountx = <9_digit_number>
//------------------------
// OUTPUT:
//   systemResult = 2
//   accountx = <9_digit_number>
//   datastring1 = <long_string>
//   datastring2 = <long_string>
//   ...
//   datastring20 = <long_string>
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
$stmt = $conn->prepare("SELECT `data` FROM `transfer` WHERE `accountx` = ? LIMIT 1");
$stmt->bind_param("i", $accountx);
$accountx = $_POST["accountx"];
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1)
{
    $datas = $result->fetch_assoc();
    $datas = json_decode($datas["data"]);
    
    // Prepend 'x' to each key
    $modifiedDatas = [];
    foreach ($datas as $key => $value) {
        $modifiedDatas['x' . $key] = $value;
    }
    
    $modifiedDatas["systemResult"] = 2;
    echo http_build_query($modifiedDatas);
}
else
{
    $obj = (object)[];
    $obj->systemResult = 3;
    $obj->msg = "Transfer data not exist";
    echo http_build_query($obj);
}

$stmt->close();
$conn->close();

//--------------------------------------------------------------
