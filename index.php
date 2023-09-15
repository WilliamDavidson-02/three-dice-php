<?php require_once __DIR__ . '/diceNumbers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ThreeDice/images/dice.svg" type="image/x-icon">
    <link rel="stylesheet" href="ThreeDice/style.css">
    <title>Three Dice</title>
</head>
<body>
    <main class="main-container">
        <div>
            <h1>Points: <?php echo $_SESSION['gamePoints']; ?></h1>
        </div>
        <div class="dice-container">
            <span><?php echo $firstDice; ?></span>
            <span><?php echo $secondDice; ?></span>
            <span><?php echo $thirdDice; ?></span>
        </div>
    </main>
</body>
</html>