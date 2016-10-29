<?php

namespace Dasc\Chess\Piece;

class Pawn extends Piece 
{
    public function getLabel()
    {
        return 'P';
    }

    public function getMoves()
    {
        return [
            'adjacent' => 1,
        ];
    }
}