<?php
$input = explode("\n", file_get_contents("Day1.txt"));
$previousDepth = $input[0];
$increase = 0;
foreach ($input as $depth) {
    if ((int)$depth > (int)$previousDepth) {
        $increase++;
    }
    $previousDepth = $depth;
}
echo $increase;