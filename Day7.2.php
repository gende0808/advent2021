<?php
$input = explode(",", file_get_contents("Day7.txt"));
$meanLow = floor(array_sum($input) / count($input)+ -0.5);
$meanHigh = ceil(array_sum($input) / count($input)+ -0.5);
foreach ($input as $num) {
    $result1 += (abs($num - $meanLow) * (abs($num - $meanLow) + 1) / 2);
    $result2 += (abs($num - $meanHigh) * (abs($num - $meanHigh) + 1) / 2);
}
echo min([$result1,$result2]);