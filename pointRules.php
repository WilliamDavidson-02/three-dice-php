<?php

if ($totalNumber >= 14) {
    $_SESSION['gamePoints'] += 1;
} 

if ($firstDice == $secondDice && $secondDice == $thirdDice) {
    $_SESSION['gamePoints'] += 2;
}

sort($numbersStraight);

if ($numbersStraight[1] - $numbersStraight[0] == 1 && $numbersStraight[2] - $numbersStraight[1] == 1) {
    $_SESSION['gamePoints'] += 3;
}