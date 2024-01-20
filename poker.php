<!DOCTYPE html>

<?php

class card {
    public $full_name;
    public $seed;
    public $value;
}

$semi = array('c', 'q', 'f', 'p');
$numeri = array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14');
$mazzo = array();

foreach ($semi as $seme) {
    foreach ($numeri as $numero) {
        $new_card = new card;
        $new_card->full_name = $numero . $seme;
        $new_card->seed = $seme;
        $new_card->value = $numero;
        $mazzo[] = $new_card;
    }
}

shuffle($mazzo);

$tavolo = array();
$giocatore1 = array();
$giocatore2 = array();
$giocatore3 = array();
$giocatore4 = array();

give_cards($tavolo, 5, $mazzo);
give_cards($giocatore1, 2, $mazzo);
give_cards($giocatore2, 2, $mazzo);
give_cards($giocatore3, 2, $mazzo);
give_cards($giocatore4, 2, $mazzo);

function give_cards(&$receiver, $numCards, &$mazzo) {
    for ($i = 0; $i < $numCards; $i++) {
        array_push($receiver, array_pop($mazzo));

    }
}

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
                    <img src="carte/<?php echo $tavolo[0]->full_name ?>.gif" class="card">
                    <img src="carte/<?php echo $tavolo[1]->full_name ?>.gif" class="card">
                    <img src="carte/<?php echo $tavolo[2]->full_name ?>.gif" class="card">
                    <img src="carte/<?php echo $tavolo[3]->full_name ?>.gif" class="card">
                    <img src="carte/<?php echo $tavolo[4]->full_name ?>.gif" class="card">
                </div>
            </div>
        </div>
        <div id="bottom-wrapper">

            <div class="player-wrapper">
                <span class="title">GIOCATORE 1 </span>
                <div class="player-cards-wrapper">
                    <img src="carte/<?php echo $giocatore1[0]->full_name ?>.gif" class="card">
                    <img src="carte/<?php echo $giocatore1[1]->full_name ?>.gif" class="card">
                </div>
                <span class="player-score"><?php echo get_player_score($giocatore1, $tavolo)?></span>
            </div>

            <div class="player-wrapper">
                <span class="title"> GIOCATORE 2</span>
                <div class="player-cards-wrapper">
                    <img src="carte/<?php echo $giocatore2[0]->full_name ?>.gif" class="card">
                    <img src="carte/<?php echo $giocatore2[1]->full_name ?>.gif" class="card">
                </div>
            </div>

            <div class="player-wrapper">
                <span class="title">GIOCATORE 3</span>
                <div class="player-cards-wrapper">
                    <img src="carte/<?php echo $giocatore3[0]->full_name ?>.gif" class="card">
                    <img src="carte/<?php echo $giocatore3[1]->full_name ?>.gif" class="card">
                </div>
            </div>

            <div class="player-wrapper">
                <span class="title">GIOCATORE 4</span>
                <div class="player-cards-wrapper">
                    <img src="carte/<?php echo $giocatore4[0]->full_name ?>.gif" class="card">
                    <img src="carte/<?php echo $giocatore4[1]->full_name ?>.gif" class="card">
                </div>
            </div>
        </div>
    </div>
</body>

<?php

function get_player_score($player, $tavolo) {
    $cards_pool = array_merge($player, $tavolo);
    if (royal_flush($cards_pool)) return 'Royal Flush';
}

function royal_flush($cards) {
    $values_cuori = array();
    $values_quadri = array();
    $values_fiori = array();
    $values_picche = array();

    $cuori = 0;
    $quadri = 0;
    $fiori = 0;
    $picche = 0;
    foreach ($cards as $card) {
        if ($card->seed == 'c') {
            $cuori++;
            array_push($values_cuori, $card->value);
        }
        else if ($card->seed == 'q') {
            $quadri++;
            array_push($values_quadri, $card->value);
        }
        else if ($card->seed == 'f') {
            $fiori++;
            array_push($values_fiori, $card->value);
        }
        else if ($card->seed == 'p') {
            $picche++;
            array_push($values_picche, $card->value);
        }
    }
    sort($values_cuori);
    sort($values_quadri);
    sort($values_fiori);
    sort($values_picche);
    
    if (str_contains(implode($values_cuori), '1011121314')) {
        return true;
    }
    else if (count($values_quadri) >= 5 && end($values_quadri) == 14 && $values_quadri[count($values_quadri) - 5] == 10) {
        return true;
    }
    else if (count($values_fiori) >= 5 && end($values_fiori) == 14 && $values_fiori[count($values_fiori) - 5] == 10) {
        return true;
    }
    else if (count($values_picche) >= 5 && end($values_picche) == 14 && $values_picche[count($values_picche) - 5] == 10) {
        return true;
    }
    return false;
}

function straight_flush($cards) {
}

function four_of_a_kind($cards) {
    
}

function full_house($cards) {
    
}

function pk_flush($cards) { //added "pk" to function name because flush already existas in php
    
}

function straight($cards) {
    
}

function three_of_a_kind($cards) {
    
}

function two_pair($cards) {
    
}

function pair($cards) {
    
}

function high_card($cards) {
    
}

?>

</html>