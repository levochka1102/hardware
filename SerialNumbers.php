<?php
require_once 'DataBase.php';
class SerialNumbers extends DataBase
{
    private $numbers, $existNumbers;
    private $validNumbers, $notValidNumbers;
    private $comparedNumbers, $notComparedNumbers;
    private $hardwareId;

    public function __construct($hardwareId, $numbersString) {
        $this->numbers = $this->toArray($numbersString);
        $this->hardwareId = $hardwareId;
        $this->existNumbers = $this->buildExistNumbers();
    }

    private function toArray($numbersString) {
        return explode("\n", $numbersString);
    }

    private function buildExistNumbers() {
        $existNumbers = [];
        $query = "SELECT `serial_number` FROM `hardware_serial` WHERE `hardware_type_id` = '$this->hardwareId'";
        $statement = self::connect()->query($query);
        while($number = mysqli_fetch_assoc($statement)) {
            $existNumbers[] = $number['serial_number'];
        }
        return $existNumbers;
    }

    public function validateNumbers($regex) {
        $numbers = $this->numbers;

        $valid = [];
        $notValid = [];
        foreach($numbers as $number) {
            $num = trim($number);
            if(preg_match($regex, $num) != false) {
                $valid[] = $num;
            }
            else {
                $notValid[] = $num;
            }
        }

        $this->validNumbers = $valid;
        $this->notValidNumbers = $notValid;
    }

    public function compareNumbersWithExist() {
        foreach ($this->validNumbers as $validNumber) {
            $valNum = trim($validNumber);
            if(in_array($valNum, $this->existNumbers)) {
                $this->notComparedNumbers[] = $valNum;
            }
            else {
                $this->comparedNumbers[] = $valNum;
            }
        }
    }

    public function addNewNumbers() {
        if(!is_null($this->comparedNumbers)) {
            foreach ($this->comparedNumbers as $number) {
                $query = "INSERT INTO `hardware_serial` (`hardware_type_id`, `serial_number`) VALUES (?, ?)";
                $statement = self::connect()->prepare($query);
                $statement->bind_param("is", $this->hardwareId, $number);
                $statement->execute();
            }
        }
    }

    public function getValid()
    {
        return $this->validNumbers;
    }

    public function getNotValid()
    {
        return $this->notValidNumbers;
    }

    public function getExistNumbers()
    {
        return $this->existNumbers;
    }

    public function getComparedNumbers()
    {
        return $this->comparedNumbers;
    }

    public function getNotComparedNumbers()
    {
        return $this->notComparedNumbers;
    }
}