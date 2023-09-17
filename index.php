<?php 
require_once __DIR__ . '/class/player.php'; 
$player = new Player(0, '');
$computer = new Player(0, 'Computer');

$playerPointsArray = $player->rollDices();
$computerPointsArray = $computer->rollDices();

$player->set_points($playerPointsArray);
$computer->set_points($computerPointsArray);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $player->set_name($_POST['playerName']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/dice.svg" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Three Dice</title>
</head>
<body>
    <main>
        <?php if ($player->get_name() === ''): ?>
        <form method="POST" class="player-register-form">
            <input type="text" placeholder="Username" name="playerName" required minlength="2">
            <button type="submit">Start Game</button>
        </form>
        <?php else: ?>
        <div class="game-container">
            <div class="player-container">
                <div class="player-info-container">
                    <h1><?php echo $computer->get_name(); ?></h1>
                    <h1>Points: <?php echo $computer->get_points(); ?></h1>
                </div>
                <div class="dice-container">
                    <?php foreach ($computerPointsArray as $dice): ?>
                        <div class="dice"><?php echo $dice?></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="player-container">
                <div class="player-info-container">
                    <h1><?php echo $player->get_name(); ?></h1>
                    <h1>Points: <?php echo $player->get_points(); ?></h1>
                </div>
                <div class="dice-container">
                    <?php foreach ($playerPointsArray as $dice): ?>
                        <div class="dice"><?php echo $dice?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </main>
</body>
</html>