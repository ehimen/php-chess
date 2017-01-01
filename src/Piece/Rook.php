<?php

namespace Dasc\Chess\Piece;

class Rook extends Piece
{
    public function getLabel()
    {
        return 'R';
    }

    public function getMoves()
    {
        return [
            'adjacent' => 8,
            'vertical' => 8,
        ];
    }
}