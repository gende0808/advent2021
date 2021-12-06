<?php
error_reporting(0);
$input = explode(PHP_EOL, file_get_contents("Day5.txt"));
$parsed = array();
$amount = 0;
foreach ($input as $line) {
    array_push($parsed, preg_split('/,| -> /', $line));
}
$map = array();
foreach ($parsed as $coordinates) {
    {
        $steps = max(abs($coordinates[2] - $coordinates[0]), (abs($coordinates[3] - $coordinates[1])));
        for ($i = 0; $i <= $steps; $i++) {
            $map[$coordinates[0]][$coordinates[1]] += 1;
            $coordinates[0] += $coordinates[2] <=> $coordinates[0];
            $coordinates[1] += $coordinates[3] <=> $coordinates[1];
        }
    }
}
array_walk_recursive($map, function (&$value) {
    global $amount;
    $amount += ($value > 1) ? 1 : 0;
});
echo $amount;