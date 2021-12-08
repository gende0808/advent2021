<?php
error_reporting(0);
$input = explode(PHP_EOL, file_get_contents("Day8.txt"));
$output = array();
foreach ($input as $line) {
    $element = array();
    $arrayAB = preg_split('/\|/', $line);
    array_push($element, [explode(" ", trim($arrayAB[0])), explode(" ", trim($arrayAB[1]))]);
    array_push($output, $element);
}
foreach ($output as $row) {
    foreach ($row[0] as $numbers) {
        if (count($numbers) != 4) {
            print_array($numbers);
            foreach ($numbers as $key => $num) {
                $one = (strlen($num) == 2) ? $num : $one;
                $four = (strlen($num) == 4) ? $num : $four;
                $seven = (strlen($num) == 3) ? $num : $seven;
                $eight = (strlen($num) == 7) ? $num : $eight;
            }
            foreach ($numbers as $num) {
                $three = (preg_match("/(?=.*$one[0])(?=.*$one[1])/", $num) && strlen($num) == 5) ? $num : $three;
            }
            foreach ($numbers as $num) {
                $nine = (preg_match("/(?=.*$three[0])(?=.*$three[1])(?=.*$three[2])(?=.*$three[3])(?=.*$three[4])/", $num) && strlen($num) == 6) ? $num : $nine;
            }
            foreach ($numbers as $num) {
                if (preg_match("/(?=.*$num[0])(?=.*$num[1])(?=.*$num[2])(?=.*$num[3])(?=.*$num[4])/", $nine) && strlen($num) == 5 && $num != $three) {
                    $five = $num;
                }
            }
            foreach ($numbers as $num) {
                if (strlen($num) == 5 && $num != $three && $num != $five) {
                    $two = $num;
                }
                if (strlen($num) == 6 && $num != $nine) {
                    if (preg_match("/(?=.*$five[0])(?=.*$five[1])(?=.*$five[2])(?=.*$five[3])(?=.*$five[4])/", $num)) {
                        $six = $num;
                    } else {
                        $zero = $num;
                    }
                }
            }
        }
        $finalNumber = "";
        foreach ($row[0][1] as $buggedNumber) {
            $finalNumber .= (strlen($buggedNumber) == 2) ? "1" : "";
            $finalNumber .= (strlen($buggedNumber) == 4) ? "4" : "";
            $finalNumber .= (strlen($buggedNumber) == 3) ? "7" : "";
            $finalNumber .= (strlen($buggedNumber) == 7) ? "8" : "";
            $finalNumber .= (strlen($buggedNumber) == 6 && preg_match("/(?=.*$zero[0])(?=.*$zero[1])(?=.*$zero[2])(?=.*$zero[3])(?=.*$zero[4])(?=.*$zero[5])/", $buggedNumber)) ? "0" : "";
            $finalNumber .= (strlen($buggedNumber) == 6 && preg_match("/(?=.*$six[0])(?=.*$six[1])(?=.*$six[2])(?=.*$six[3])(?=.*$six[4])(?=.*$six[5])/", $buggedNumber)) ? "6" : "";
            $finalNumber .= (strlen($buggedNumber) == 6 && preg_match("/(?=.*$nine[0])(?=.*$nine[1])(?=.*$nine[2])(?=.*$nine[3])(?=.*$nine[4])(?=.*$nine[5])/", $buggedNumber)) ? "9" : "";
            $finalNumber .= (strlen($buggedNumber) == 5 && preg_match("/(?=.*$three[0])(?=.*$three[1])(?=.*$three[2])(?=.*$three[3])(?=.*$three[4])/", $buggedNumber)) ? "3" : "";
            $finalNumber .= (strlen($buggedNumber) == 5 && preg_match("/(?=.*$five[0])(?=.*$five[1])(?=.*$five[2])(?=.*$five[3])(?=.*$five[4])/", $buggedNumber)) ? "5" : "";
            $finalNumber .= (strlen($buggedNumber) == 5 && preg_match("/(?=.*$two[0])(?=.*$two[1])(?=.*$two[2])(?=.*$two[3])(?=.*$two[4])/", $buggedNumber)) ? "2" : "";

        }
        $bignum += $finalNumber;
    }
}
echo $bignum / 2;