<?php
require_once 'db.php';
require_once 'getHardwareList.php';

// get data from form
$serial_number = $_POST['serial_number'];
$type_name = $_POST['type_name'];

// explode serial numbers
$serial_number_list = array_diff(explode("\n", $serial_number), array(""));

// list for build regular expression
$type_mask_matcher = array(
    "N" => "\d",
    "A" => "[A-Z]",
    "a" => "[a-z]",
    "X" => "[0-9A-Z]",
    "Z" => "[-_@]"
);

// function search mask of specified type_name
function getMask($hardware_list, $type_name)
{
    return $hardware_list[$type_name];
}

// function build regular expression
function buildRegEx($type_mask_matcher, $mask)
{
    $regEx = "/";
    for($index = 0; $index <= strlen($mask) - 1; $index++){
        $regEx .= $type_mask_matcher[$mask[$index]];
    }
    return ($regEx . "/");
}

// this function return list of valid numbers
function getValidNumbers($serial_number_list, $regEx) {
    $matches = [];
    foreach($serial_number_list as $number) {
        if(preg_match($regEx, $number) != false) {
            $matches[] = $number;
        }
        else {
            echo ($number . " не соответствует маске выбранного типа<br>");
        }
    }
    return($matches);
}

// list of valid serial numbers
$validNumbers = array_unique(getValidNumbers($serial_number_list, buildRegEx($type_mask_matcher, getMask($hardware_list, $type_name))));

// id of current hardware type
$id = mysqli_fetch_assoc(mysqli_query($db, "SELECT `id` FROM `hardware_type` WHERE `type_name` LIKE '$type_name'"))[id];

// get list of exist serial numbers current hardware
$existNumbers = [];
$exist_numbers_query = mysqli_query($db, "SELECT `serial_number` FROM `hardware_serial` WHERE `hardware_type_id` = '$id'");
while($number = mysqli_fetch_assoc($exist_numbers_query)) {
    $existNumbers[] = $number[serial_number];
}

// insert number to db
foreach ($validNumbers as $validNumber) {
    if(isExist($validNumber, $existNumbers)) {
        echo ($validNumber . " уже существует<br>");
    }
    else {
        mysqli_query($db, "INSERT INTO `hardware_serial` (`hardware_type_id`, `serial_number`) VALUES ('$id', '$validNumber')");
    }
}
function isExist($validNumber, $existNumbers) {
    foreach ($existNumbers as $existNumber){
        if (strcasecmp($validNumber, $existNumber) == 0) {
            return true;
        }
    }
    return false;
}