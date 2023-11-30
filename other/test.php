<?php

// Convert $_POST to a JSON string
$jsonString = json_encode($_POST);

// Write the JSON string to a file
$file = 'test.json';
file_put_contents($file, $jsonString, FILE_APPEND);
