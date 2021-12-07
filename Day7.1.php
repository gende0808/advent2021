<?php
$input = explode(",", file_get_contents("Day7.txt"));
sort($input);
$median = $input[floor(count($input) / 2)];
foreach($input as $num) $result += abs($num - $median);
echo $result;