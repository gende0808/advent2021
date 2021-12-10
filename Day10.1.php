<?php
$input = explode(PHP_EOL, file_get_contents("Day10.txt"));
for ($i = 0; $i < count($input); $i++) {
    do {
        $input[$i] = preg_replace('/\[\]|\(\)|\<\>|\{\}/', "", $input[$i], -1, $count);
    } while ($count);
}
foreach($input as $line){
    if(preg_match('/\]|\}|\>|\)/',$line,$matches)){
        $totalscore += score($matches[0]);
    }
}
echo $totalscore;

function score($str)
{
    switch ($str) {
        case ")":
            return 3;
        case "]":
            return 57;
        case "}":
            return 1197;
        case ">":
            return 25137;
    }
}