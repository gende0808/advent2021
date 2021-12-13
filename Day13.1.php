<?php
$input = explode(PHP_EOL, file_get_contents("Day13.txt"));
$coords = array();
$folds = array();
$total = 0;
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
    $map[$coord[1]][$coord[0]] = "#";
}
$firstFold = $folds[0];
if ($firstFold[0] == "y") {
    foreach ($map as $xkey => $x) {
        if ($xkey > $firstFold[1]) {
            //array push this
            if (!isset($map[($firstFold[1] - ($xkey - $firstFold[1]))])) {
                $map[($firstFold[1] - ($xkey - $firstFold[1]))] = $map[$xkey];
                unset($map[$xkey]);
            } else {
                foreach ($map[$xkey] as $hashtagkey => $hashtag) {
                    $map[($firstFold[1] - ($xkey - $firstFold[1]))][$hashtagkey] = "#";
                }
                unset($map[$xkey]);
            }
        }
    }
}
if ($firstFold[0] == "x") {
    foreach ($map as $rowkey => $row) {
        foreach ($row as $ykey => $y) {
            if ($ykey > $firstFold[1]) {
                $map[$rowkey][$firstFold[1] - ($ykey - $firstFold[1])] = "#";
                unset($map[$rowkey][$ykey]);

            }
        }
    }
}
array_walk_recursive($map, function (&$value) {
    if ($value == "#") {
        $value = 0;
        global $total;
        $total += 1;
    }
});
echo $total;