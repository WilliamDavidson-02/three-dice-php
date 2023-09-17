<?php 
require_once __DIR__ . '/class/player.php'; 

$playerPoints = (isset($_POST['playerPoints'])) ? $_POST['playerPoints'] : 0;
$playerName = (isset($_POST['playerName'])) ? $_POST['playerName'] : '';

$computerPoints = (isset($_POST['computerPoints'])) ? $_POST['computerPoints'] : 0;

$diceSides = (isset($_POST['sides'])) ? $_POST['sides'] : 6;

$player = new Player($playerPoints, $playerName, $diceSides);
$computer = new Player($computerPoints, 'Computer', $diceSides);

$playerPointsArray = $player->rollDices();
$computerPointsArray = $computer->rollDices();

$player->set_points($playerPointsArray, $diceSides);
$computer->set_points($computerPointsArray, $diceSides);

$rounds = (isset($_POST['rounds'])) ? $_POST['rounds'] : 1;
$currentRound = (isset($_POST['currentRound'])) ? $_POST['currentRound'] : 1;
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
            <input class="border" type="text" placeholder="Username" name="playerName" required minlength="2">
            <label for="rounds">Select Rounds</label>
            <select name="rounds" class="border rounds-container">
                <?php for ($i = 1; $i <= 20; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <label for="sides">Select dice sides</label>
            <select name="sides" class="border rounds-container">
                <?php for ($i = 3; $i <= 9; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <button class="border" type="submit">Start Game</button>
        </form>
        <?php elseif ($currentRound <= $rounds): ?>
        <form method="post" class="game-form-container">
            <input type="hidden" name="sides" value="<?php echo $diceSides; ?>">
            <div>
                <h1>Round: <?php echo $currentRound; ?>/<?php echo $rounds; ?></h1>
                <input type="hidden" name="rounds" value="<?php echo $rounds; ?>">
                <?php $currentRound++?>
                <input type="hidden" name="currentRound" value="<?php echo $currentRound; ?>">
            </div>
            <div class="game-container">
                <div class="player-container border">
                    <div class="player-info-container">
                        <h1><?php echo $computer->get_name(); ?></h1>
                        <h1>Points: <?php echo $computer->get_points(); ?></h1>
                        <input type="hidden" name="computerPoints" value="<?php echo $computer->get_points(); ?>">
                    </div>
                    <div class="dice-container">
                        <?php foreach ($computerPointsArray as $dice): ?>
                            <div class="dice border"><?php echo $dice?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="player-container border">
                    <div class="player-info-container">
                        <h1><?php echo $player->get_name(); ?></h1>
                        <input type="hidden" name="playerName" value="<?php echo $player->get_name(); ?>">
                        <h1>Points: <?php echo $player->get_points(); ?></h1>
                        <input type="hidden" name="playerPoints" value="<?php echo $player->get_points(); ?>">
                    </div>
                    <div class="dice-container">
                        <?php foreach ($playerPointsArray as $dice): ?>
                            <div class="dice border"><?php echo $dice?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="dice-roll-btn-container">
                <button class="border" type="submit"><i class="fa-solid fa-dice"></i></button>
                <a title="Cancel the game" class="border cancel-btn" href="/"><i class="fa-solid fa-x"></i></a>
            </div>
        </form>
        <?php else: ?>
        <div class="border game-over-container">
            <?php if ($player->get_points() > $computer->get_points()): ?>
            <h1>Winner is <?php echo $player->get_name(); ?></h1>
            <?php elseif ($player->get_points() < $computer->get_points()): ?>
            <h1>Winner is <?php echo $computer->get_name(); ?></h1>
            <?php else: ?>
            <h1>It's a draw</h1>
            <?php endif; ?>
            <div class="border score-container">
                <h3>Score</h3>
                <div><?php echo $computer->get_name(); ?>: <?php echo $computer->get_points(); ?></div>
                <div><?php echo $player->get_name(); ?>: <?php echo $player->get_points(); ?></div>
            </div>
            <a title="Cancel the game" class="border cancel-btn" href="/"><i class="fa-solid fa-x"></i></a>
        </div>
        <?php endif; ?>
    </main>
</body>
</html>