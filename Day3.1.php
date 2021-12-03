<?php
$input = explode(PHP_EOL, file_get_contents("Day3.txt"));
$array = array();
foreach ($input as $line) {
    for ($i = 0; $i < strlen($line); $i++) {
        $array[$i] .= $line[$i];
    }
}
foreach ($array as $listOfBits) {
    $bitsArray = str_split($listOfBits);
    $avg = round(array_sum($bitsArray) / count($bitsArray));
    $gamma .= $avg;
    $epsilon .= 1 - $avg;
}
echo bindec($gamma) * bindec($epsilon); 