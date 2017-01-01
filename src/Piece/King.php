<?php

namespace Dasc\Chess\Piece;

class King extends Piece
{
    public function getLabel()
    {
        return 'K';
    }

    public function getMoves()
    {
        return [
            'adjacent' => 1,
            'vertical' => 1,
        ];
    }
}