<?php

namespace Dasc\Chess\Board;

use Dasc\Chess\Piece\Bishop;
use Dasc\Chess\Piece\King;
use Dasc\Chess\Piece\Knight;
use Dasc\Chess\Piece\Pawn;
use Dasc\Chess\Piece\Queen;
use Dasc\Chess\Piece\Rook;

class Board
{
    /**
     * @var Tile[]
     */
    private $tiles = [];
    
    public function __construct()
    {
        $columns = static::getColumns();
        $rows    = static::getRows();
        $white   = true;    // Is the tile white? We'll flip this to false to mean black.
        
        foreach ($rows as $row) {
            foreach ($columns as $column) {
                $colour    = $white ? 'white' : 'black';
                $reference = $row . $column;
                $tile      = new Tile($colour, $reference);


                if (in_array($column, [1,2], true)){
                    $pieceColour = 'white';
                }else{
                    $pieceColour = 'black';
                }
                
                if (in_array($column, [2,7], true)){
                    $tile->setPiece(new Pawn($pieceColour));
                }elseif (in_array($reference, ['C1', 'F1', 'C8', 'F8'], true)){
                    $tile->setPiece(new Bishop($pieceColour));
                }elseif (in_array($reference, ['A1', 'H1', 'A8', 'H8'], true)){
                    $tile->setPiece(new Rook($pieceColour));
                }elseif (in_array($reference, ['E1', 'E8'], true)){
                    $tile->setPiece(new King($pieceColour));
                }elseif (in_array($reference, ['D1', 'D8'], true)){
                    $tile->setPiece(new Queen($pieceColour));
                }elseif (in_array($reference, ['B1', 'G1', 'B8', 'G8'], true)){
                    $tile->setPiece(new Knight($pieceColour));
                }
                
                $this->tiles[$column][$row] = $tile;
                $white = !$white;
            }
            
            // When we get to the end of a row, flip our white/black flag once
            // more to ensure the next column has alternating black/white tiles.
            $white = !$white;
        }
    }

    public static function getColumns()
    {
        return [8, 7, 6, 5, 4, 3, 2, 1];
    }

    public static function getRows()
    {
        return ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    }

    /**
     * @return Tile
     */
    public function getTileAtPosition($column, $row)
    {
        return $this->tiles[$column][$row];
    }
}