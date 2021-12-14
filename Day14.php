<?php
$input = explode(PHP_EOL, file_get_contents("Day14.txt"));
$combinations = array();
$template = str_split(trim($input[0]));
$instructions = array();
for ($i = 0; $i < count($template); $i++) {
    if (isset($template[$i + 1])) {
        if (!isset($combinations[$template[$i] . $template[$i + 1]])) {
            $combinations[$template[$i] . $template[$i + 1]] = 0;
        }
        $combinations[$template[$i] . $template[$i + 1]] = 1;
    }
}
for ($i = 2; $i < count($input); $i++) {
    $temp = preg_split("/ -> /", $input[$i]);
    $instructions[$temp[0]] = $temp[1];
}
for ($amount = 0; $amount < 40; $amount++) {
    $newcombinations = array();
    foreach ($combinations as $key => $repeat) {
        if (!isset($newcombinations[$key[0] . $instructions[$key]])) {
            $newcombinations[$key[0] . $instructions[$key]] = 0;
        }
        $newcombinations[$key[0] . $instructions[$key]] += $repeat;
        if (!isset($newcombinations[$instructions[$key] . $key[1]])) {
            $newcombinations[$instructions[$key] . $key[1]] = 0;
        }
        $newcombinations[$instructions[$key] . $key[1]] += $repeat;
    }
    $combinations = array();
    $combinations = $newcombinations;
}
foreach ($combinations as $key => $combination) {
    $totalArray[$key[0]] += $combination;
}
//trailing letter needs to be accounted for separately.
$totalArray[end($template)] += 1;
echo max($totalArray) - min($totalArray);