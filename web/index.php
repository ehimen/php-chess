<?php

require_once '../vendor/autoload.php';

use Dasc\Chess\Board\Board;
use Dasc\Chess\Game;

$game = new Game();
$board = $game->getBoard();

?>

<style>
    .tile {
        height: 100px;
        width: 100px;
        text-align: center;
        vertical-align: middle
    }
    
    .tile-black {
        background: black;
    }
    
    .tile-white {
        background: white;
    }
    
    .piece {
        border-radius: 25px;
        height: 50px;
        width: 50px;
        display: inline-block;
        border: 2px solid;
        font-weight: 900;
        font-size: 18px;
    }
    
    .piece-white {
        border-color: black;
        background-color: white;
        color: black;
    }
    
    .piece-black {
        border-color: white;
        background-color: black;
        color: white;
    }
    
    .tile-reference {
        float: left;
    }

    .tile-black .tile-reference {
        color: white;
    }
</style>

<?php

echo '<table border="1">';

foreach (Board::getColumns() as $column) {
    
    echo '<tr>';
    
    foreach (Board::getRows() as $row) {
        $tile        = $board->getTileAtPosition($column, $row);
        $tileContent = '';
        $tileClass   = 'tile';
        $pieceClass  = 'piece';
        
        if ('black' === $tile->getColour()) {
            $tileClass .= ' tile-black';
        } else {
            $tileClass .= ' tile-white';
        }
        
        if ($piece = $tile->getPiece()) {
            
            if ($piece->getSide() === 'black') {
                $pieceClass .= ' piece-black';
            } else {
                $pieceClass .= ' piece-white';
            }
            
            $tileContent = '<span class="' . $pieceClass . '">' . $piece->getLabel() . '</span>';
        }
        
        
        echo '<td class="' . $tileClass . '"><p class="tile-reference">' . $column . $row . '</p>' . $tileContent . '</td>';
    }
    
    echo '</tr>';
}

echo '</table>';