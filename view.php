<?php
require_once 'control.php';

if(!is_null($numbers->getNotValid())) {
    foreach($numbers->getNotValid() as $number){
        echo "$number" . " не соответствует маске оборудования<br>";
    }
}
if(!is_null($numbers->getNotComparedNumbers())) {
    foreach($numbers->getNotComparedNumbers() as $number){
        echo "$number" . " номер уже существует<br>";
    }
}