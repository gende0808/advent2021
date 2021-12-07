<?php
error_reporting(0);
$input = explode(",", file_get_contents("Day6.txt"));
foreach ($input as $num) {
    $fish[$num] += 1;
}   
for ($i = 0; $i < 256; $i++) {
    $newState = array();
    foreach ($fish as $key => $amount) {
        if ($key == 0) {
            $newState[6] += $amount;
            $newState[8] += $amount;
        } else {
            $newState[$key - 1] += $amount;
        }
    }
    $fish = $newState;
}
echo array_sum($fish);