<?php

namespace Dasc\Chess\Piece;

abstract class Piece
{
    /**
     * @var string
     */
    private $side;
    
    public function __construct($side)
    {
        $this->side = $side;
    }

    public function getSide()
    {
        return $this->side;
    }
    
    /**
     * @return string
     */
    abstract public function getLabel();

    /**
     * @return array
     */
    abstract public function getMoves();
}