<?php

class RegexBuilder
{
    private $regex;
    private $typeMaskMatcher = array(
        "N" => "\d",
        "A" => "[A-Z]",
        "a" => "[a-z]",
        "X" => "[0-9A-Z]",
        "Z" => "[-_@]"
    );

    public function __construct($mask) {
        $this->regex = $this->buildRegex($mask);
    }

    private function buildRegex($mask) {
        $regex = $this->regex;
        $typeMaskMatcher = $this->typeMaskMatcher;

        $regex = "/";
        for($index = 0; $index <= strlen($mask) - 1; $index++){
            $regex .= $typeMaskMatcher[$mask[$index]];
        }
        $regex .= "/";

        $this->regex = $regex;
        return $regex;
    }

    public function getRegex()
    {
        return $this->regex;
    }
}