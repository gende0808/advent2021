<?php
$gamma = "";
$epsilon = "";
$input = explode(PHP_EOL, file_get_contents("Day3.txt"));
$array = array();
foreach ($input as $line) {
    for ($i = 0; $i < strlen($line); $i++) {
        $array[$i] .= $line[$i];
    }
}
$count = array();
foreach ($array as $listOfBits) {
 $count = (count_chars($listOfBits));
 if($count[48] > $count[49]){
     $gamma .= "0";
     $epsilon .= "1";
 } else{
     $gamma .= "1";
     $epsilon .= "0";
 }
}
echo bindec($gamma) * bindec($epsilon);
