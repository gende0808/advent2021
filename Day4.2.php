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
foreach ($drawnNumbers as $drawnkey => $drawnNumber) {
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
                unset($listOfCards[$key]);
            }
            if (array_sum((array_column($card, $keyRow))) == 0) {
                unset($listOfCards[$key]);
            }
            if (count($listOfCards) == 1) {
                $listOfCards = array_values($listOfCards);
                print_array($listOfCards);
                printCard($listOfCards[0], $drawnNumbers[$drawnkey+1]);
            }
        }
    }
}
function printCard($card, $drawnNumber)
{
    //first upcoming is 66
    $total = 0;
    foreach ($card as $row) {
        $total += array_sum($row);
    }
    echo ($total - 66) * 66 ."<br>";
    exit();
}
