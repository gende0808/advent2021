<?php
$input = explode(PHP_EOL, file_get_contents("Day9.txt"));
$arraysYay = array();
foreach ($input as $line) array_push($arraysYay, str_split($line, 1));
for ($i = 0; $i < count($arraysYay); $i++) {
    for ($j = 0; $j < count($arraysYay[$i]); $j++) {
        $north = (isset($arraysYay[$i - 1][$j])) ? $arraysYay[$i - 1][$j] : 11;
        $west = (isset($arraysYay[$i][$j - 1])) ? $arraysYay[$i][$j - 1] : 11;
        $south = (isset($arraysYay[$i + 1][$j])) ? $arraysYay[$i + 1][$j] : 11;
        $east = (isset($arraysYay[$i][$j + 1])) ? $arraysYay[$i][$j + 1] : 11;
        $currentPos = $arraysYay[$i][$j];
        $sum += ($north > $currentPos && $east > $currentPos && $west > $currentPos && $south > $currentPos) ? $currentPos+1 : 0;
    }
}
echo $sum;