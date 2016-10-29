<?php

namespace Dasc\Chess\Board;

use Dasc\Chess\Piece\Bishop;
use Dasc\Chess\Piece\Pawn;

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
        
        foreach ($columns as $column) {
            foreach ($rows as $row) {
                $colour    = $white ? 'white' : 'black';
                $reference = $column . $row;
                $tile      = new Tile($colour, $reference);
                
                if (2 === $row) {
                    $tile->setPiece(new Pawn('white'));
                } elseif (7 === $row) {
                    $tile->setPiece(new Pawn('black'));
                } elseif (('C1' === $reference) || ('F1' === $reference)) {
                    $tile->setPiece(new Bishop('white'));
                } elseif (('C8' === $reference) || ('F8' === $reference)) {
                    $tile->setPiece(new Bishop('black'));
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
        return ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    }

    public static function getRows()
    {
        return [1, 2, 3, 4, 5, 6, 7, 8];
    }

    /**
     * @return Tile
     */
    public function getTileAtPosition($column, $row)
    {
        return $this->tiles[$column][$row];
    }
}