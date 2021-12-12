<?php

include "functions.php";
$input = explode(PHP_EOL, file_get_contents("Day12.txt"));
error_reporting(0);
$totalarray = loop(["start" => 0], ["start"]);
print_array($totalarray);
function loop($currentnodes, $previousnodes)
{
    global $input;
    $totalArray = array();
    foreach ($currentnodes as $nodekey => $currentnode) {
        foreach ($input as $line) {
            if (str_contains($line, $nodekey)) {
                $connectednode = str_replace(["-$nodekey", "$nodekey-"], "", $line);
                if (!in_array($connectednode, $previousnodes) || preg_match('/[A-Z]/', $connectednode[0])) {
                    $connectednodes[$connectednode] = 1;
                    $newarray = $previousnodes;
                    array_push($newarray, $nodekey);
                    print_array($connectednodes);
                    $deep = loop2($connectednodes, $newarray);
                    array_push($connectednodes, $deep);
                }
            }
        }
        array_push($totalArray, $connectednodes);
    }
    return $totalArray;
}
function loop2($currentnodes, $previousnodes)
{
    global $input;
    $totalArray = array();
    foreach ($currentnodes as $nodekey => $currentnode) {
        echo $nodekey;
        foreach ($input as $line) {
            if (str_contains($line, $nodekey)) {
                $connectednode = str_replace(["-$nodekey", "$nodekey-"], "", $line);
                if (!in_array($connectednode, $previousnodes) || preg_match('/[A-Z]/', $connectednode[0])) {
                    $connectednodes[$connectednode] = 1;
                    $newarray = $previousnodes;
                    array_push($newarray, $nodekey);
//                    $deep = loop2($connectednodes, $newarray);
//                    array_push($connectednodes, $deep);
                }
            }
        }
        array_push($totalArray, $connectednodes);
    }
    return $totalArray;
}
