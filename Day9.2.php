<?php
$input = explode(PHP_EOL, file_get_contents("Day9.txt"));
$arraysYay = array();
$basinID = 10;
foreach ($input as $line) array_push($arraysYay, str_split($line, 1));
for ($i = 0; $i < count($arraysYay); $i++) {
    for ($j = 0; $j < count($arraysYay[$i]); $j++) {
        if ($arraysYay[$i][$j] < 9) {
            adjacencyLoop($i, $j, $basinID);
            $basinID++;
        }
    }
}
function adjacencyLoop($i, $j, $basinID)
{
    global $arraysYay;
    $arraysYay[$i][$j] = $basinID;
    $north = (isset($arraysYay[$i - 1][$j])) ? $arraysYay[$i - 1][$j] : 9;
    $west = (isset($arraysYay[$i][$j - 1])) ? $arraysYay[$i][$j - 1] : 9;
    $south = (isset($arraysYay[$i + 1][$j])) ? $arraysYay[$i + 1][$j] : 9;
    $east = (isset($arraysYay[$i][$j + 1])) ? $arraysYay[$i][$j + 1] : 9;
    if ($north < 9) {
        $arraysYay[$i - 1][$j] = $basinID;
        adjacencyLoop($i - 1, $j, $basinID);
    }
    if ($west < 9) {
        $arraysYay[$i][$j - 1] = $basinID;
        adjacencyLoop($i, $j - 1, $basinID);
    }
    if ($east < 9) {
        $arraysYay[$i][$j + 1] = $basinID;
        adjacencyLoop($i, $j + 1, $basinID);
    }
    if ($south < 9) {
        $arraysYay[$i + 1][$j] = $basinID;
        adjacencyLoop($i + 1, $j, $basinID);
    }
}
$values = array_count_values(array_reduce($arraysYay, 'array_merge', array()));
rsort($values);
echo $values[1] * $values[2] * $values[3];