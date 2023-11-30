<?php

//------------------------
// INPUT:
//   accountx = <9_digit_number>
//------------------------
// OUTPUT:
//   systemResult = 2
//   xmycode = <character_code>
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

//--------------------------------------------------------------
//connection
//--------------------------------------------------------------

require "lib/connect.php";

//--------------------------------------------------------------
//work
//--------------------------------------------------------------

$id = strtoupper($_POST["accountx"]);

$stmt = $conn->prepare("SELECT `mycode` FROM `oc` WHERE `accountx` = ? LIMIT 1");
$stmt->bind_param('s', $id); // 's' specifies the variable type => 'string'
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1)
{
    $datas = $result->fetch_assoc();

    $obj = (object)[];
    $obj->systemResult = 2;
    $obj->xmycode = $datas["mycode"];

    echo http_build_query($obj);
}
else
{
    $obj = (object)[];
    $obj->systemResult = 3;
    $obj->msg = "Character not exist in the database";
    echo http_build_query($obj);
}
$stmt->close();
$conn->close();

//--------------------------------------------------------------