<?php
error_reporting(0);
include "functions.php";
$input = explode(PHP_EOL, file_get_contents("Day5.txt"));
$parsed = array();
$amount = 0;
foreach ($input as $line) {
    array_push($parsed, preg_split('/,| -> /', $line));
}
$map = array();
foreach ($parsed as $coordinates) {
    $ystart = min([$coordinates[1], $coordinates[3]]);
    $yend = max([$coordinates[1], $coordinates[3]]);
    $xstart = min([$coordinates[0], $coordinates[2]]);
    $xend = max([$coordinates[0], $coordinates[2]]);
    if ($xstart == $xend) {
        for ($i = $ystart; $i <= $yend; $i++) {
            $map[$coordinates[0]][$i] += 1;
        }
    } elseif ($ystart == $yend) {
        for ($i = $xstart; $i <= $xend; $i++) {
            $map[$i][$coordinates[1]] += 1;

        }
    } else {
        for($i = $xstart; $i <= $xend; $i++){
            $map[$coordinates[0]][$coordinates[1]] += 1;
            if($coordinates[0] < $coordinates[2]){
                $coordinates[0]++;
            } else{
                $coordinates[0]--;
            }
            if($coordinates[1] < $coordinates[3]){
                $coordinates[1]++;
            } else{
                $coordinates[1]--;
            }
        }
    }
}
array_walk_recursive($map, function (&$value) {
    global $amount;
    $amount += ($value > 1) ? 1 : 0;
});
echo $amount;