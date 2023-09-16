<?php require_once __DIR__ . '/diceNumbers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/dice.svg" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Three Dice</title>
</head>
<body>
    <main class="main-container">
        <div class="history-container">
            <div>
                <h1 class="history-h1">Dice Roll History</h1>
                <?php 
                    foreach ($_SESSION['diceRollHistory'] as $diceRound) {
                ?>
                    <div class="history-round-container">
                        <span><?php echo $diceRound[0]; ?></span>
                        <span><?php echo $diceRound[1]; ?></span>
                        <span><?php echo $diceRound[2]; ?></span>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <form class="dice-form">
            <div>
                <h1>Points: <?php echo $_SESSION['gamePoints']; ?></h1>
            </div>
            <div class="dice-container">
                <span><?php echo $firstDice; ?></span>
                <span><?php echo $secondDice; ?></span>
                <span><?php echo $thirdDice; ?></span>
            </div>
            <div class="btn-container-dice">
                <button class="dice-game-btn" type="submit">roll the dice</button>
                <a class="dice-game-btn" href="/?resetGame=true"><i class="fa-solid fa-rotate-left"></i></a>
            </div>
        </form>
    </main>
</body>
</html>