<?php
include "functions.php";
error_reporting(0);
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
foreach ($folds as $fold) {
    if ($fold[0] == "y") {
        foreach ($map as $xkey => $x) {
            if ($xkey > $fold[1]) {
                //array push this
                if (!isset($map[($fold[1] - ($xkey - $fold[1]))])) {
                    $map[($fold[1] - ($xkey - $fold[1]))] = $map[$xkey];
                    unset($map[$xkey]);
                } else {
                    foreach ($map[$xkey] as $hashtagkey => $hashtag) {
                        $map[($fold[1] - ($xkey - $fold[1]))][$hashtagkey] = "#";
                    }
                    unset($map[$xkey]);
                }
            }
        }
    }
    if ($fold[0] == "x") {
        foreach ($map as $rowkey => $row) {
            foreach ($row as $ykey => $y) {
                if ($ykey > $fold[1]) {
                    $map[$rowkey][$fold[1] - ($ykey - $fold[1])] = "#";
                    unset($map[$rowkey][$ykey]);

                }
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
print_array($map);
for ($i = 0; $i < 20; $i++) {
    for ($j = 0; $j < 40; $j++) {
        if ($map[$i][$j] === 0) {
            echo "<div class='block blue'></div>";
        } else {
            echo "<div class='block red'></div>";

        }

    }
    echo"<br>";
}
?>
<style>
    .block{
        height:14px;
        width: 14px;
        float:left;
    }
    .blue{
        background-color: blue;
    }
    .red{
        background-color: red;
    }
</style>
