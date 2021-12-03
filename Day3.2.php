<?php
error_reporting(0);

$input = explode(PHP_EOL, file_get_contents("Day3.txt"));

$oxygen = "";
$CO2 = "";


repeatMe($input);
repeatMe($input, "co2");
echo bindec($oxygen) * bindec($CO2);


function repeatMe($array, $type = "", $countFrom = 0)
{
    if (count($array) == 1) {
        global $oxygen;
        global $CO2;
        if($type == "co2"){
            $CO2 = $array[0];
        } else{
            $oxygen = $array[0];
        }
    } else {
        $mostOccurringNumber = mostOccurring($array, $countFrom);
        if ($type == "co2") {
            //becomes least occurring number
            $mostOccurringNumber = 1 - $mostOccurringNumber;
        }
        $newArray = array();
        foreach ($array as $line) {
            if ($line[$countFrom] == $mostOccurringNumber) {
                array_push($newArray, $line);
            }
        }
        $countFrom++;
        repeatMe($newArray, $type, $countFrom);
    }
}

function mostOccurring($input, $countFrom)
{
    $array = array();
    $one = 0;
    $zero = 0;
    foreach ($input as $line) {
        if ($line[$countFrom] == 1) {
            $one++;
        } else {
            $zero++;
        }
    }
    return ($one >= $zero) ? "1" : "0";
}