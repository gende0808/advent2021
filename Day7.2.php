<?php
$input = explode(",", file_get_contents("Day7.txt"));
$mean = floor(round(array_sum($input) / count($input) + -0.5));
foreach ($input as $num) {
    $result += (abs($num - $mean) * (abs($num - $mean) + 1) / 2);
}
echo round($result);