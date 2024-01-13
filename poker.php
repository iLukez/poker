<!DOCTYPE html>

<?php
$semi = array('c', 'q', 'f', 'p');
$numeri = array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14');
$mazzo = array();

foreach ($semi as $seme) {
    foreach ($numeri as $numero) {
        $mazzo[] = $numero . $seme;
    }
}

shuffle($mazzo);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="poker.css">
    <title>Poker</title>
</head>
<body>
    <div id="game-wrapper">
        <div id="top-wrapper">
            <div id="mazzo-wrapper">
                <span class="title">MAZZO</span>
                <img src="carte/back.gif" class="card">
            </div>
            <div id="table-wrapper">
                <span class="title">TAVOLO</span>
                    <div id="table-cards-wrapper">
                        <img src="carte/<?php echo array_pop($mazzo) ?>.gif" class="card">
                        <img src="carte/<?php echo array_pop($mazzo) ?>.gif" class="card">
                        <img src="carte/<?php echo array_pop($mazzo) ?>.gif" class="card">
                        <img src="carte/<?php echo array_pop($mazzo) ?>.gif" class="card">
                        <img src="carte/<?php echo array_pop($mazzo) ?>.gif" class="card">
                    </div>
            </div>
        </div>
    </div>
</body>
</html>