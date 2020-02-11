<?php 
// Begins a per session cookie (the book mentioned this needing to be done before any HTML output is processed so I'm putting this here)
session_set_cookie_params(0, '/');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blackjack Game</title>
    </head>
    <body>
        <form method="post" action="blackjack.php">
            <?php
            // Placeholder functions
            function getCard(&$deck, &$hand) {
                // array shift does not return the key for the associative array, which hinders card tracking
                // this builds to the hand by setting the key for the card and its value
                $keys = array_keys($deck);
                $hand[$keys[0]] = array_shift($deck);
            }

            function getWinner($dealer, $player, $dealer_played = false) {
                // tests for a natural 21 and returns the winner
                if (array_sum($dealer) == 21) {
                    return 'dealer';
                } else if (array_sum($player) == 21) {
                    return 'player';
                } 

                // only if the dealer has played their turn will a winner be determined
                if ($dealer_played) {
                    if (array_sum($dealer) > array_sum($player)) {
                        return 'dealer';
                    } else if (array_sum($player) > array_sum($dealer)) {
                        return 'player';
                    } else if (array_sum($player) == array_sum($dealer)){
                        return 'tie';
                    }
                }
            }

            $action = (empty($_POST['action'])) ? ' ' : $_POST['action'];
            switch ($action) {
                case 'Play Again!':
                case 'Play BlackJack':
                    // set the deck of cards then shuffle the deck
                    $deck = array('2S' => 2, '3S' => 3, '4S' => 4, '5S' => 5, '6S' => 6, '7S' => 7, '8S' => 8, '9S' => 9, '10S' => 10, 'JS' => 10, 'QS' => 10, 'KS' => 10, 'AS' => 11,
                                  '2H' => 2, '3H' => 3, '4H' => 4, '5H' => 5, '6H' => 6, '7H' => 7, '8H' => 8, '9H' => 9, '10H' => 10, 'JH' => 10, 'QH' => 10, 'KH' => 10, 'AH' => 11,
                                  '2D' => 2, '3D' => 3, '4D' => 4, '5D' => 5, '6D' => 6, '7D' => 7, '8D' => 8, '9D' => 9, '10D' => 10, 'JD' => 10, 'QD' => 10, 'KD' => 10, 'AD' => 11,
                                  '2C' => 2, '3C' => 3, '4C' => 4, '5C' => 5, '6C' => 6, '7C' => 7, '8C' => 8, '9C' => 9, '10C' => 10, 'JC' => 10, 'QC' => 10, 'KC' => 10, 'AC' => 11);

                    // shuffle overwrites the keys of an associative array so the keys are instead shuffled and a new array built of the shuffled deck
                    $keys = array_keys($deck); 
                    shuffle($keys); 
                    $shuffled_deck = array();

                    foreach ($keys as $k) { 
                      $shuffled_deck[$k] = $deck[$k]; 
                    }

                    $_SESSION['s_deck'] = $shuffled_deck;
                    $_SESSION['p_hand'] = array(); // player hand of cards
                    $_SESSION['d_hand'] = array(); // dealer hand of cards

                    // deals cards to player and dealer
                    for($i = 0; $i < 2; $i++) {
                        getCard($_SESSION['s_deck'], $_SESSION['p_hand']);
                        getCard($_SESSION['s_deck'], $_SESSION['d_hand']);
                    }

                    switch (getWinner($_SESSION['d_hand'], $_SESSION['p_hand'])) {
                        case 'dealer':
                            echo '<h2>Dealer has a natural 21! House wins!</h2>';
                            echo 'Dealer Total: ' . array_sum($_SESSION['d_hand']) . '<br/>';
                            echo 'Player Total: ' . array_sum($_SESSION['p_hand']) . '<br/><br/>';
                            echo '<input type="submit" value="Play Again!" name="action"/>';
                            break;
                        case 'player':
                            echo '<h2>Player has a natural 21! You win!</h2>';
                            echo 'Dealer Total: ' . array_sum($_SESSION['d_hand']) . '<br/>';
                            echo 'Player Total: ' . array_sum($_SESSION['p_hand']) . '<br/><br/>';
                            echo '<input type="submit" value="Play Again!" name="action"/>';
                            break;
                        default:
                            echo '<input type="submit" value="HIT" name="action"/><br/>';
                            echo '<input type="submit" value="STAND" name="action"/><br/><br/>';  

                            // echo the values of both the player and dealer hands (only show one value of the dealers cards)
                            echo 'Dealer Hand:<br/>';
                            foreach($_SESSION['d_hand'] as $card => $value) {
                                echo $card . '<br/>';
                                break;  // break so only one card is shown for the dealer
                            }

                            echo 'Player Hand:<br/>';
                            foreach($_SESSION['p_hand'] as $card => $value) {
                                $p_total += $value;
                                echo $card . '<br/>';
                            }
                            echo 'Player Total = ' . array_sum($_SESSION['p_hand']) . '<br/>';
                            break;
                    }
                    break;
                case 'HIT':
                    // get a card for the player and determine if they went over 21.
                    // if they have not went over repeat option for hit or stand
                    getCard($_SESSION['s_deck'], $_SESSION['p_hand']);

                    if (array_sum($_SESSION['p_hand']) < 22) {
                        echo '<input type="submit" value="HIT" name="action"/><br/>';
                        echo '<input type="submit" value="STAND" name="action"/><br/><br/>';                        

                        // echo the values of both the player and dealer hands (only show one value of the dealers cards)
                        echo 'Dealer Hand:<br/>';
                        foreach($_SESSION['d_hand'] as $card => $value) {
                            echo $card . '<br/>';
                            break;  // break so only one card is shown for the dealer
                        }

                        echo 'Player Hand:<br/>';
                        foreach($_SESSION['p_hand'] as $card => $value) {
                            echo $card . '<br/>';
                        }
                        echo 'Player Total = ' . array_sum($_SESSION['p_hand']) . '<br/>';
                    } else {
                        echo '<h2>You busted! House wins.</h2>';
                        echo 'Dealer Total: ' . array_sum($_SESSION['d_hand']) . '<br/>';
                        echo 'Player Total: ' . array_sum($_SESSION['p_hand']) . '<br/><br/>';
                        echo '<input type="submit" value="Play Again!" name="action"/>';
                    }                                                
                    break;
                case 'STAND':
                    // let the dealer take their turn and determine winner
                    while (array_sum($_SESSION['d_hand']) < 17 && array_sum($_SESSION['d_hand']) <= array_sum($_SESSION['p_hand'])) {
                        getCard($_SESSION['s_deck'], $_SESSION['d_hand']);
                    }

                    if (array_sum($_SESSION['d_hand']) > 21) {
                        echo '<h2>Dealer has busted! You win!</h2>';
                        echo 'Dealer Total: ' . array_sum($_SESSION['d_hand']) . '<br/>';
                        echo 'Player Total: ' . array_sum($_SESSION['p_hand']) . '<br/><br/>';
                        echo '<input type="submit" value="Play Again!" name="action"/>';
                    } else {
                        switch (getWinner($_SESSION['d_hand'], $_SESSION['p_hand'], true)) {
                            case 'dealer':
                                echo '<h2>Dealer has ' . array_sum($_SESSION['d_hand']) . ' House wins!</h2>';
                                echo 'Dealer Total: ' . array_sum($_SESSION['d_hand']) . '<br/>';
                                echo 'Player Total: ' . array_sum($_SESSION['p_hand']) . '<br/><br/>';
                                echo '<input type="submit" value="Play Again!" name="action"/>';
                                break;
                            case 'player':
                                echo '<h2>Player has ' . array_sum($_SESSION['p_hand']) . ' You win!</h2>';
                                echo 'Dealer Total: ' . array_sum($_SESSION['d_hand']) . '<br/>';
                                echo 'Player Total: ' . array_sum($_SESSION['p_hand']) . '<br/><br/>';
                                echo '<input type="submit" value="Play Again!" name="action"/>';
                                break;
                            case 'tie':
                                echo '<h2>Dealer and Player Tied! The hand is over.</h2>';
                                echo 'Dealer Total: ' . array_sum($_SESSION['d_hand']) . '<br/>';
                                echo 'Player Total: ' . array_sum($_SESSION['p_hand']) . '<br/><br/>';
                                echo '<input type="submit" value="Play Again!" name="action"/>';
                                break;
                        }
                    }
                    break;
                default :
                    echo '<input type="submit" value="Play BlackJack" name="action"/>';
                    break;
            }
            ?>
        </form>
    </body>
</html>