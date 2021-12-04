<?php
$input = explode(PHP_EOL, file_get_contents("Day4.txt"));
$drawnNumbers = explode(",", $input[0]);
$listOfCards = array();
for ($i = 2; $i < count($input); $i += 6) {
    $bingoCard = array();
    for ($j = $i; $j < $i + 5; $j++) {
        $bingonums = preg_split('/\s+/', $input[$j]);
        if (count($bingonums) == 6) {
            unset($bingonums[0]);
            $bingonums = array_values($bingonums);
        }
        array_push($bingoCard, $bingonums);
    }
    array_push($listOfCards, $bingoCard);
}
foreach ($drawnNumbers as $drawnNumber) {
    foreach ($listOfCards as $key => $card) {
        foreach ($card as $keyRow => $row) {
            foreach ($row as $keynum => $num) {
                if ($num == $drawnNumber) {
                    $listOfCards[$key][$keyRow][$keynum] = 0;
                }
            }
        }
    }
    foreach ($listOfCards as $key => $card) {
        foreach ($card as $keyRow => $row) {
            if (array_sum($row) == 0) {
                printCard($card, $drawnNumber);
            }
            if (array_sum((array_column($card, $keyRow))) == 0) {
                printCard($card, $drawnNumber);
            }
        }
    }
}
function printCard($card, $drawnNumber)
{
    $total = 0;
    foreach ($card as $row) {
        $total += array_sum($row);
    }
    echo $total * $drawnNumber;
    exit();
}