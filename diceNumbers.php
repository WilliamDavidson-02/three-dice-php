<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['gamePoints'])) {
    $_SESSION['gamePoints'] = 0;
}

$firstDice = rand(1, 6);
$secondDice = rand(1, 6);
$thirdDice = rand(1, 6);

$totalNumber = $firstDice + $secondDice + $thirdDice;

if ($totalNumber >= 14) {
    $_SESSION['gamePoints'] += 1;
} 

if ($firstDice == $secondDice && $secondDice == $thirdDice) {
    $_SESSION['gamePoints'] += 2;
}

$numbersStraight = [$firstDice, $secondDice, $thirdDice];
sort($numbersStraight);

if ($numbersStraight[1] - $numbersStraight[0] == 1 && $numbersStraight[2] - $numbersStraight[1] == 1) {
    $_SESSION['gamePoints'] += 3;
}