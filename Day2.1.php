<?php
$input = explode(PHP_EOL, file_get_contents("Day2.txt"));
$x = 0;
$y = 0;
foreach ($input as $movement) {
    $movement = explode(" ", $movement);
    $direction = $movement[0];
    $distance = (int)$movement[1];
    if ($direction == "up") {
        $y += $distance;
    }
    if ($direction == "forward") {
        $x += $distance;
    }
    if ($direction == "down") {
        $y -= $distance;
    }
}
echo $y;