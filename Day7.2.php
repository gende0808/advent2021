<?php
$input = explode(",", file_get_contents("Day7.txt"));
$mean = floor(array_sum($input) / count($input));
foreach ($input as $num) {
   $result += (abs($num - $mean) * (abs($num - $mean) + 1) / 2);
}
echo round($result);