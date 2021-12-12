<?php
error_reporting(0);
include "functions.php";
$input = explode(PHP_EOL, file_get_contents("Day12.txt"));
$totalarray = (loop(["start" => 0], " bla", ["start" => 1]));
print_array($totalarray);

$totalsum = 0;
array_walk_recursive($totalarray, function (&$value, $key) {
    if ($key == "en")
        global $totalsum;
    $totalsum += 1;
});
echo $totalsum;
function loop($currentnode, $previousnode, $visitednodes)
{
    $layervisited = $visitednodes;
    $realcurrentNode = key($currentnode);
    global $input;
    $connectednodes = array();
    foreach ($input as $line) {
        if (str_contains($line, $realcurrentNode) && $realcurrentNode != $previousnode) {
            {
                $potentialnode = str_replace(["-$realcurrentNode", "$realcurrentNode-"], "", $line);
                if (preg_match('/[A-Z]/', $potentialnode[0]) || !array_key_exists($potentialnode, $visitednodes)) {
                    if ($realcurrentNode != "en") {
                        $visitednodes[$potentialnode] += 1;
                        $connectednodes[$potentialnode] = 1;
                        $deep = loop([$potentialnode => 1], $realcurrentNode, $visitednodes);
                        array_push($connectednodes, $deep);
                    }
                }
            }
        }
    }
    
    return $connectednodes;
}