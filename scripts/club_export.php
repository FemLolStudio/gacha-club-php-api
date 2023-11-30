<?php

//------------------------
// INPUT:
//   accountx = <7_digit_character> // 0-9 & A-Z
//   mycode = <character_code>
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

if (!isset($_POST["accountx"]))
{
    $obj = (object)[];
    $obj->systemResult = 3;
    $obj->msg = "accountx error";
    die(http_build_query($obj));
}

if (!isset($_POST["mycode"]) || mb_substr_count($_POST["mycode"], '|') != 444)
{
    $obj = (object)[];
    $obj->systemResult = 3;
    $obj->msg = "mycode error";
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
$stmt = $conn->prepare("INSERT INTO `oc`(`accountx`, `mycode`) VALUES (?,?)");
$stmt->bind_param("ss", $accountx, $mycode);

// set parameters and execute
$accountx = strtoupper($_POST["accountx"]);
$mycode = $_POST["mycode"];
$mycode = str_replace("||", "|-|", $mycode);
$mycode = str_replace("||", "|-|", $mycode);
$mycode = str_replace("| |", "|-|", $mycode);
$mycode = str_replace("| |", "|-|", $mycode);
$stmt->execute();

$obj = (object)[];
$obj->systemResult = 2;
$obj->msg = "Uploaded successfully";
echo http_build_query($obj);

$stmt->close();
$conn->close();

//--------------------------------------------------------------
