<?php
$input = explode("\n", file_get_contents("Day1.txt"));
$previousDepth = (int)$input[0] + (int)$input[1] + (int)$input[2];
$increase = 0;
for($i = 0; $i < count($input) - 2; $i ++) {
    $depth = (int)$input[$i] + (int)$input[$i + 1] + (int)$input[$i + 2];
    if ($depth  > (int)$previousDepth) {
        $increase++;
    }
    $previousDepth = $depth;
}
echo $increase;