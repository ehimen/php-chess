<?php

namespace Dasc\Chess\Board;

use Dasc\Chess\Piece\Piece;

class Tile
{
    /**
     * @var string
     */
    private $reference;

    /**
     * @var Piece
     */
    private $piece;

    /**
     * @var string
     */
    private $colour;
    
    public function __construct($colour, $reference)
    {
        $this->reference = $reference;
        $this->colour    = $colour;
    }

    public function setPiece(Piece $piece)
    {
        $this->piece = $piece;
    }

    public function getColour()
    {
        return $this->colour;
    }

    public function getPiece()
    {
        return $this->piece;
    }
}