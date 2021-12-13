<?php
include "functions.php";
$input = explode(PHP_EOL, file_get_contents("Day13.txt"));
$coords = array();
$folds = array();
foreach ($input as $line) {
    if (is_numeric($line[0])) {
        $coord = explode(",", $line);
        $coords[] = $coord;
    }
    if (str_contains($line, "fold")) {
        $whatIWant = substr($line, strpos($line, "along ") + 6);
        $whatINeed = explode("=", $whatIWant);
        $folds[] = $whatINeed;
    }
}

foreach ($coords as $coord) {
    $map[$coord[0]][$coord[1]] = "#";
}


$firstFold = $folds[0];
//fold up
if ($firstFold[0] == "y") {
    foreach ($map as $xkey => $x) {
        if ($xkey < $firstFold[1]) {
            if(!isset($map[$firstFold[1] - $xkey])){
                $map[$xkey + (($firstFold[1] - $xkey) * 2)] = $map[$xkey];
                unset($map[$xkey]);
            } else {
                $map[$xkey + (($firstFold[1] - $xkey) * 2)] = array_merge($map[$firstFold[1] - $xkey], $map[$xkey]);
                unset($map[$xkey]);
            }
        }
    }
}
if($firstFold[0] == "x"){
    foreach($map as $rowkey => $row){
        foreach ($row as $ykey => $y){
            if ($ykey > $firstFold[1]) {
                if(!isset($map[$rowkey][$ykey - $firstFold[1]])){
                    $map[$rowkey][$ykey - $firstFold[1]] = $map[$rowkey][$ykey];
                    unset($map[$rowkey][$ykey]);
                } else {
                    $map[$rowkey][$ykey - $firstFold[1]] = array_merge($map[$rowkey][$ykey - $firstFold[1]], $map[$rowkey][$ykey]);
                    unset($map[$rowkey][$ykey]);
                }
            }
        }
    }
}
print_array($map);