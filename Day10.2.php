<?php
$input = explode(PHP_EOL, file_get_contents("Day10.txt"));
for ($i = 0; $i < count($input); $i++) {
    do {
        $input[$i] = preg_replace('/\[\]|\(\)|\<\>|\{\}/', "", $input[$i], -1, $count);
    } while ($count);
    $input[$i] = (preg_match('/\]|\}|\>|\)/', $input[$i])) ? null : $input[$i];
}
$input = array_filter($input);
$closingtagsArray = array();
foreach ($input as $line) {
    $closingtags = "";
    for ($i = strlen($line) - 1; $i >= 0; $i--) {
        $closingtags .= ($line[$i] == "[") ? "]" : "";
        $closingtags .= ($line[$i] == "{") ? "}" : "";
        $closingtags .= ($line[$i] == "(") ? ")" : "";
        $closingtags .= ($line[$i] == "<") ? ">" : "";
    }
    array_push($closingtagsArray, score($closingtags));
}
sort($closingtagsArray);
echo $closingtagsArray[floor(count($closingtagsArray) / 2)];
function score($str)
{
    $totalscore = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $totalscore = ($str[$i] == ")") ? $totalscore * 5 + 1 : $totalscore;
        $totalscore = ($str[$i] == "]") ? $totalscore * 5 + 2 : $totalscore;
        $totalscore = ($str[$i] == "}") ? $totalscore * 5 + 3 : $totalscore;
        $totalscore = ($str[$i] == ">") ? $totalscore * 5 + 4 : $totalscore;
    }
    return $totalscore;
}