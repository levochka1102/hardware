<?php
require 'Hardware.php';
require 'RegexBuilder.php';
require 'SerialNumbers.php';

// get data from form
$serial_number = $_POST['serial_number'];
$type_name = $_POST['type_name'];

$currentHardware = Hardware::getHardwareList()[$type_name];
$currentHardwareMask = $currentHardware['mask'];
$currentHardwareId = $currentHardware['id'];
$regex = new RegexBuilder($currentHardwareMask);

$numbers = new SerialNumbers($currentHardwareId, $serial_number);

$numbers->validateNumbers($regex->getRegex());
$numbers->compareNumbersWithExist();
$numbers->addNewNumbers();

include 'view.php';

