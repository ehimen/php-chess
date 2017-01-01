<?php

namespace Dasc\Chess\Piece;

class Knight extends Piece
{
    public function getLabel()
    {
        return 'Kn';
    }

    public function getMoves()
    {
        return [
        ['adjacent' => 1, 'vertical' => 3],
        ['adjacent' => 3, 'vertical' => 1],
        ];
    }
}