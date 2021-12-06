<?php
$input = explode(PHP_EOL, file_get_contents("Day4.txt"));
$drawnNumbers = explode(",", $input[0]);
$listOfCards = array();
for ($i = 2; $i < count($input); $i += 6) {
    $bingoCard = array();
    for ($j = $i; $j < $i + 5; $j++) {
        $bingonums = array_push($bingoCard, preg_split('/\s+/', trim($input[$j])));
    }
    array_push($listOfCards, $bingoCard);
}
foreach ($drawnNumbers as $drawnNumber) {
    array_walk_recursive($listOfCards, function (&$value) {
        global $drawnNumber;
        $value = ($value == $drawnNumber) ? 0 : $value;
    });
    foreach ($listOfCards as $key => $card) {
        foreach ($card as $keyRow => $row) {
            if (array_sum($row) == 0 || array_sum((array_column($card, $keyRow))) == 0) {
                if(count($listOfCards) == 1 || count($listOfCards) == 100){
                    echo array_sum((call_user_func_array('array_merge', $card))) * $drawnNumber . "<br>";
                }
                unset($listOfCards[$key]);
            }
        }
    }
}