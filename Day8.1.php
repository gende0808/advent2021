<?php
$input = explode(PHP_EOL, file_get_contents("Day8.txt"));
$output = array();
foreach($input as $line) array_push($output,explode(" ", preg_split('/,| \| /', $line)[1]));
$amount = 0;
array_walk_recursive($output, function (&$val){
    global $amount;
    $amount += (in_array(strlen($val), [2,3,4,7]) )? 1 : 0;
});
echo $amount;