<?php
include "functions.php";
$input = explode(PHP_EOL, file_get_contents("Day12.txt"));
error_reporting(0);
$totalarray = loop(["start"]);
echo count($totalarray);
function loop($strings)
{
    global $input;
    $newStrings = array();
    foreach ($strings as $string) {
        $stringArray = explode(" ", $string);
        $lastConnection = end($stringArray);
        if ($lastConnection == "end") {
            array_push($newStrings, $string);
        } else {
            foreach ($input as $line) {
                if (str_contains($line, $lastConnection) && $lastConnection != "end") {
                    $newlastconnection = str_replace(["-$lastConnection", "$lastConnection-"], "", $line);
                    end($stringArray);
                    $previousNode = prev($stringArray);
                    if (!in_array($newlastconnection, $stringArray) || preg_match('/[A-Z]/', $newlastconnection)) {
                        $newstring = $string . " " . $newlastconnection;
                        array_push($newStrings, $newstring);

                    }
                }
            }
        }
    }
    if($newStrings != $strings){
        $newStrings = loop($newStrings);
    }
    return $newStrings;
}

