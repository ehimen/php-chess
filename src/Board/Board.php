<?php

namespace Dasc\Chess\Board;

use Dasc\Chess\Piece\Bishop;
use Dasc\Chess\Piece\King;
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
                
                if (2 === $column) {
                    $tile->setPiece(new Pawn('white'));
                } elseif (7 === $column) {
                    $tile->setPiece(new Pawn('black'));
                } elseif (('C1' === $reference) || ('F1' === $reference)) {
                    $tile->setPiece(new Bishop('white'));
                } elseif (('C8' === $reference) || ('F8' === $reference)) {
                    $tile->setPiece(new Bishop('black'));
                } elseif (('A1' === $reference) || ('H1' === $reference)){
                    $tile->setPiece(new Rook('white'));
                } elseif (('A8' === $reference) || ('H8' === $reference)){
                    $tile->setPiece(new Rook('black'));
                } elseif ('E1' === $reference) {
                    $tile->setPiece(new King('white'));
                } elseif ('E8' === $reference) {
                    $tile->setPiece(new King('black'));
                } elseif ('D1' === $reference){
                    $tile->setPiece(new Queen('white'));
                } elseif ('D8' === $reference){
                    $tile->setPiece(new Queen('black'));
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