<?php
$input = explode(PHP_EOL, file_get_contents("Day2.txt"));
$x = 0;
$y = 0;
$aim = 0;
foreach ($input as $movement) {
    $movement = explode(" ", $movement);
    $direction = $movement[0];
    $distanceOrAim = (int)$movement[1];
    if ($direction == "up") {
        $aim += $distanceOrAim;
    }
    if ($direction == "down") {
        $aim -= $distanceOrAim;
    }
    if ($direction == "forward") {
        $y += $distanceOrAim * $aim;
        $x += $distanceOrAim;

    }
}
echo $x * $y;