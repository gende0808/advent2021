<?php
$input = explode(PHP_EOL, file_get_contents("Day11.txt"));
$array = array();
$octoPusSum = 1;
foreach ($input as $row) array_push($array, str_split(trim($row)));
for ($amount = 0; $octoPusSum > 0 ; $amount++) {
    global $octopusSum;
    $octoPusSum = 0;
    for ($rowKey = 0; $rowKey < count($array); $rowKey++) {
        for ($octopusKey = 0; $octopusKey < count($array[$rowKey]); $octopusKey++) {
            $array[$rowKey][$octopusKey] += 1;
            adjacencyLoop($rowKey, $octopusKey);
        }
    }
    array_walk_recursive($array, function (&$value) {
        if ($value > 9) {
            $value = 0;
        }
        global $octoPusSum;
        $octoPusSum += $value;
    });
}
echo $amount;
function adjacencyLoop($i, $j)
{
    global $array;
    if ($array[$i][$j] == 10) {
        $array[$i][$j] += 1;

        if (isset($array[$i - 1][$j - 1])) {
            $array[$i - 1][$j - 1] += 1;
            if ($array[$i - 1][$j - 1] == 10) {
                adjacencyLoop($i - 1, $j - 1);
            }
        }
        if (isset($array[$i - 1][$j])) {
            $array[$i - 1][$j] += 1;
            if ($array[$i - 1][$j] == 10) {
                adjacencyLoop($i - 1, $j);
            }
        }
        if (isset($array[$i - 1][$j + 1])) {
            $array[$i - 1][$j + 1] += 1;
            if ($array[$i - 1][$j + 1] == 10) {
                adjacencyLoop($i - 1, $j + 1);
            }
        }
        if (isset($array[$i][$j - 1])) {
            $array[$i][$j - 1] += 1;
            if ($array[$i][$j - 1] == 10) {
                adjacencyLoop($i, $j - 1);
            }
        }
        if (isset($array[$i][$j + 1])) {
            $array[$i][$j + 1] += 1;
            if ($array[$i][$j + 1] == 10) {
                adjacencyLoop($i, $j + 1);
            }
        }
        if (isset($array[$i + 1][$j - 1])) {
            $array[$i + 1][$j - 1] += 1;
            if ($array[$i + 1][$j - 1] == 10) {
                adjacencyLoop($i + 1, $j - 1);
            }
        }
        if (isset($array[$i + 1][$j])) {
            $array[$i + 1][$j] += 1;
            if ($array[$i + 1][$j] == 10) {
                adjacencyLoop($i + 1, $j);
            }
        }
        if (isset($array[$i + 1][$j + 1])) {
            $array[$i + 1][$j + 1] += 1;
            if ($array[$i + 1][$j + 1] == 10) {
                adjacencyLoop($i + 1, $j + 1);
            }
        }
    }
}